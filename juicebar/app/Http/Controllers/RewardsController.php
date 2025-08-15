<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('orderItems')->latest()->take(5)->get();
        
        // Calculate points from recent orders
        $recentPointsEarned = $orders->sum('total');
        
        return view('rewards', [
            'user' => $user,
            'orders' => $orders,
            'recentPointsEarned' => floor($recentPointsEarned),
            'availableRewards' => $this->getAvailableRewards()
        ]);
    }

    public function redeem(Request $request)
    {
        $rewardId = $request->reward_id;
        $rewards = $this->getAvailableRewards();
        $reward = collect($rewards)->where('id', $rewardId)->first();

        if (!$reward) {
            return response()->json(['error' => 'Invalid reward selected.'], 400);
        }

        $user = Auth::user();
        if ($user->points < $reward['points_required']) {
            return response()->json(['error' => 'Insufficient points.'], 400);
        }

        // Deduct points
        if ($user->deductPoints($reward['points_required'])) {
            return response()->json([
                'success' => true,
                'message' => "Congratulations! You've redeemed: {$reward['title']}",
                'remaining_points' => $user->fresh()->points
            ]);
        }

        return response()->json(['error' => 'Unable to process redemption.'], 500);
    }

    private function getAvailableRewards()
    {
        return [
            [
                'id' => 1,
                'title' => 'Free Small Juice',
                'description' => 'Get any small juice for free',
                'points_required' => 100,
                'emoji' => '🥤',
                'color' => 'from-green-500 to-emerald-500'
            ],
            [
                'id' => 2,
                'title' => '10% Off Next Order',
                'description' => '10% discount on your next purchase',
                'points_required' => 150,
                'emoji' => '💰',
                'color' => 'from-blue-500 to-indigo-500'
            ],
            [
                'id' => 3,
                'title' => 'Free Large Juice',
                'description' => 'Get any large juice for free',
                'points_required' => 200,
                'emoji' => '🍹',
                'color' => 'from-purple-500 to-pink-500'
            ],
            [
                'id' => 4,
                'title' => 'Custom Juice Bundle',
                'description' => 'Create 3 custom juices for free',
                'points_required' => 300,
                'emoji' => '🎯',
                'color' => 'from-orange-500 to-red-500'
            ],
            [
                'id' => 5,
                'title' => '20% Off Next Order',
                'description' => '20% discount on your next purchase',
                'points_required' => 400,
                'emoji' => '🎉',
                'color' => 'from-pink-500 to-rose-500'
            ],
            [
                'id' => 6,
                'title' => 'VIP Member Status',
                'description' => 'Unlock exclusive juices and perks',
                'points_required' => 1000,
                'emoji' => '👑',
                'color' => 'from-yellow-500 to-amber-500'
            ]
        ];
    }
}