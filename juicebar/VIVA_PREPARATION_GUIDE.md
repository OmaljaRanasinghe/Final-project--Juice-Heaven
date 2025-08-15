# 🎯 Laravel Juice Bar E-Commerce Project - Complete Viva Preparation Guide

## Project Overview
- **Project Name**: Juice Bar E-Commerce System
- **Framework**: Laravel 12.0 with Breeze Authentication
- **Database**: MySQL with Eloquent ORM
- **Frontend**: Blade Templates with Tailwind CSS
- **Payment Integration**: Stripe API
- **Currency**: LKR (Sri Lankan Rupees) - Converted from USD

---

## 📋 Quick Reference Card

### Key Statistics
- **Models**: 7 (User, Product, Order, CartItem, CustomJuice, Fruit, OrderItem)
- **Controllers**: 8+ (Admin, Cart, Payment, CustomizeJuice, etc.)
- **User Roles**: 3 (Admin, Employee, Customer)
- **Database Tables**: 8+ with proper foreign key relationships
- **Payment Methods**: Stripe integration with LKR support

---

## 🔥 1. OOP Concepts Implemented

### 1.1 Classes and Objects

#### Model Classes (Data Objects)
```php
// User model - Represents all system users
class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'role', 'points'];
    protected $hidden = ['password', 'remember_token'];
}

// Product model - Juice products
class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'ingredients', 'image'];
    protected $casts = ['ingredients' => 'array'];
}

// Order model - Customer orders
class Order extends Model
{
    protected $fillable = ['user_id', 'billing_name', 'total', 'status'];
    protected $casts = ['subtotal' => 'decimal:2', 'total' => 'decimal:2'];
}
```

#### Controller Classes (Business Logic)
```php
// CartController - Shopping cart operations
class CartController extends Controller
{
    public function add(Request $request)
    public function update(Request $request, CartItem $cartItem)
    public function remove(CartItem $cartItem)
}

// CustomizeJuiceController - Custom juice creation
class CustomizeJuiceController extends Controller
{
    public function store(Request $request)
    private function calculateDominantColor($selectedFruits, $fruits)
}
```

### 1.2 Inheritance

#### Controller Inheritance
```php
// Base controller class
abstract class Controller
{
    // Common functionality for all controllers
}

// All controllers inherit from base
class CartController extends Controller
class AdminController extends Controller
class PaymentController extends Controller
```

#### Model Inheritance
```php
// User extends Laravel's Authenticatable
class User extends Authenticatable
{
    use HasFactory, Notifiable;
}

// Other models extend base Model
class Product extends Model
class Order extends Model
class CartItem extends Model
```

### 1.3 Polymorphism

#### Dynamic Behavior in CartItem
```php
class CartItem extends Model
{
    // Polymorphic behavior - can handle Product OR CustomJuice
    public function getTotalPriceAttribute()
    {
        if ($this->custom_juice_id) {
            return $this->quantity * $this->customJuice->total_price;
        }
        return $this->quantity * $this->product->price;
    }

    public function getNameAttribute()
    {
        if ($this->custom_juice_id) {
            return $this->customJuice->name;
        }
        return $this->product->name;
    }
}
```

#### Method Overriding
```php
// Different payment processing methods
class PaymentController extends Controller
{
    public function processCard($data) { /* Card processing */ }
    public function processPayPal($data) { /* PayPal processing */ }
    public function processApplePay($data) { /* Apple Pay processing */ }
}
```

### 1.4 Encapsulation

#### Protected Properties
```php
class User extends Authenticatable
{
    // Encapsulated data - controlled access
    protected $fillable = ['name', 'email', 'password', 'role', 'points'];
    protected $hidden = ['password', 'remember_token'];
    
    // Private data casting
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```

#### Private Methods
```php
class CustomizeJuiceController extends Controller
{
    // Private method - internal use only
    private function calculateDominantColor($selectedFruits, $fruits)
    {
        $dominantColor = '#ff6b35'; // fallback
        $maxWeight = 0;
        
        foreach ($colors as $colorData) {
            if ($colorData['weight'] > $maxWeight) {
                $maxWeight = $colorData['weight'];
                $dominantColor = $colorData['color'];
            }
        }
        return $dominantColor;
    }
}
```

### 1.5 Abstraction

#### Abstract Classes
```php
// Laravel's base Controller is abstract
abstract class Controller
{
    // Provides common functionality without implementation
}
```

#### Interface Implementation
```php
// Laravel contracts (interfaces) used
class User extends Authenticatable implements MustVerifyEmail
{
    // Must implement email verification methods
}
```

### 1.6 Traits Usage

```php
class User extends Authenticatable
{
    use HasFactory;    // Provides factory() method for testing
    use Notifiable;    // Enables email/SMS notifications
}

class Product extends Model
{
    use HasFactory;    // Database seeding capabilities
}
```

---

## 🗄️ 2. Database Relations

### 2.1 One-to-Many Relationships

#### User → CartItems
```php
// User model
public function cartItems()
{
    return $this->hasMany(CartItem::class);
}

// CartItem model
public function user()
{
    return $this->belongsTo(User::class);
}
```

#### User → Orders
```php
// User model
public function orders()
{
    return $this->hasMany(Order::class);
}

// Order model
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
```

#### Order → OrderItems
```php
// Order model
public function orderItems(): HasMany
{
    return $this->hasMany(OrderItem::class);
}

// OrderItem model
public function order(): BelongsTo
{
    return $this->belongsTo(Order::class);
}
```

#### User → CustomJuices
```php
// User model
public function customJuices()
{
    return $this->hasMany(CustomJuice::class);
}

// CustomJuice model
public function user()
{
    return $this->belongsTo(User::class);
}
```

### 2.2 Many-to-Many Relationships

#### User ↔ Products (Favorites)
```php
// User model
public function favoriteProducts()
{
    return $this->belongsToMany(Product::class, 'user_favorites')
                ->withTimestamps();
}

// Product model
public function favoritedByUsers()
{
    return $this->belongsToMany(User::class, 'user_favorites')
                ->withTimestamps();
}
```

#### User ↔ CustomJuices (Favorites)
```php
// User model
public function favoriteCustomJuices()
{
    return $this->belongsToMany(CustomJuice::class, 'custom_juice_favorites')
                ->withTimestamps();
}

// CustomJuice model
public function favoritedByUsers()
{
    return $this->belongsToMany(User::class, 'custom_juice_favorites')
                ->withTimestamps();
}
```

### 2.3 Database Schema Structure

#### Key Tables with Relationships
```sql
-- Users table (Central entity)
users: id, name, email, password, role, points, created_at, updated_at

-- Products table
products: id, name, description, price, ingredients(JSON), image, created_at

-- Orders table
orders: id, user_id(FK), order_number, billing_name, total, status, created_at

-- Cart Items table  
cart_items: id, user_id(FK), product_id(FK), custom_juice_id(FK), quantity

-- Custom Juices table
custom_juices: id, user_id(FK), name, selected_fruits(JSON), total_price

-- Order Items table
order_items: id, order_id(FK), product_id(FK), custom_juice_id(FK), quantity

-- Fruits table
fruits: id, name, price_per_serving, color, is_available, stock_level

-- Pivot Tables (Many-to-Many)
user_favorites: user_id(FK), product_id(FK), created_at, updated_at
custom_juice_favorites: user_id(FK), custom_juice_id(FK), created_at
```

### 2.4 Foreign Key Constraints

```php
// Migration examples
Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->decimal('total', 10, 2);
    $table->timestamps();
});

Schema::create('user_favorites', function (Blueprint $table) {
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('product_id')->constrained()->onDelete('cascade');
    $table->unique(['user_id', 'product_id']);
    $table->timestamps();
});
```

---

## 🔐 3. Session Management

### 3.1 Authentication Implementation

#### Laravel Sanctum Configuration
```php
// config/auth.php
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
],
```

#### Login Process
```php
class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate user
        $request->authenticate();
        
        // Regenerate session for security
        $request->session()->regenerate();
        
        // Redirect based on role
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'employee') {
            return redirect()->route('employee.dashboard');
        }
        
        return redirect()->intended(route('dashboard'));
    }
}
```

### 3.2 Middleware Usage

#### Admin Middleware
```php
class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Admin privileges required.');
        }
        return $next($request);
    }
}
```

#### Employee Middleware
```php
class Employee
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'employee') {
            abort(403, 'Access denied. Employee access required.');
        }
        return $next($request);
    }
}
```

### 3.3 Role-Based Access Control

#### Route Protection
```php
// Admin routes - Full system access
Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::resource('products', AdminProductController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('orders', AdminOrderController::class);
    });

// Employee routes - Operational access
Route::middleware(['auth', 'verified', 'employee'])
    ->prefix('employee')
    ->name('employee.')
    ->group(function () {
        Route::get('/dashboard', [EmployeeController::class, 'dashboard']);
        Route::get('/orders', [EmployeeOrderController::class, 'index']);
        Route::get('/profile', [EmployeeController::class, 'profile']);
    });

// Customer routes - Shopping access
Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/cart', [CartController::class, 'index']);
    });
```

### 3.4 Session Data Management

#### Cart Persistence
```php
// Cart data stored in database, linked to user session
public function add(Request $request)
{
    $cartItem = CartItem::where('user_id', Auth::id())
        ->where('product_id', $product->id)
        ->first();
        
    if ($cartItem) {
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        CartItem::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $quantity
        ]);
    }
}
```

#### Billing Data Storage
```php
// Temporary session storage for checkout process
class BillingController extends Controller
{
    public function process(Request $request)
    {
        // Store billing data in session temporarily
        Session::put('billing_data', $request->all());
        
        // Process payment
        $billingData = Session::get('billing_data');
        
        // Clear session after successful order
        Session::forget('billing_data');
    }
}
```

---

## 🏗️ 4. Laravel Framework Features

### 4.1 MVC Architecture Implementation

#### Models (Data Layer)
```php
// Handle database operations and business logic
class Order extends Model
{
    protected $fillable = ['user_id', 'total', 'status'];
    
    // Relationships
    public function user() { return $this->belongsTo(User::class); }
    public function orderItems() { return $this->hasMany(OrderItem::class); }
    
    // Business logic
    public function canBeCancelled() {
        return in_array($this->status, ['pending', 'confirmed']);
    }
}
```

#### Views (Presentation Layer)
```blade
{{-- Blade template with components --}}
<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Shopping Cart') }}</h2>
    </x-slot>

    <div class="py-12">
        @foreach($cartItems as $item)
            <div class="cart-item">
                <h3>{{ $item->name }}</h3>
                <p>LKR {{ number_format($item->total_price, 0) }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
```

#### Controllers (Business Logic)
```php
// Handle HTTP requests and coordinate between Models and Views
class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with(['product', 'customJuice'])
            ->where('user_id', Auth::id())
            ->get();
            
        $subtotal = $cartItems->sum('total_price');
        $deliveryFee = $subtotal >= 7500 ? 0 : 1497;
        
        return view('cart', compact('cartItems', 'subtotal', 'deliveryFee'));
    }
}
```

### 4.2 Eloquent ORM Usage

#### Query Builder Examples
```php
// Complex queries with relationships
$orders = Order::with('user', 'orderItems')
    ->where('status', 'pending')
    ->whereDate('created_at', today())
    ->get();

// Aggregations and calculations
$totalRevenue = Order::where('status', 'completed')
    ->sum('total');

$averageOrderValue = Order::where('status', 'completed')
    ->avg('total');
```

#### Scopes and Accessors
```php
class Fruit extends Model
{
    // Query scope
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true)
                    ->where('stock_level', '>', 0);
    }
    
    // Accessor
    public function getFormattedPriceAttribute()
    {
        return 'LKR ' . number_format($this->price_per_serving, 0);
    }
}

// Usage
$availableFruits = Fruit::available()->get();
```

### 4.3 Blade Templating System

#### Component System
```php
// Component classes
class AdminLayout extends Component
{
    public function render()
    {
        return view('layouts.admin');
    }
}

class EmployeeLayout extends Component
{
    public function render()
    {
        return view('layouts.employee');
    }
}
```

#### Template Inheritance
```blade
{{-- layouts/app.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Juice Bar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        {{ $header ?? '' }}
    </header>
    <main>
        {{ $slot }}
    </main>
</body>
</html>

{{-- Using the layout --}}
<x-app-layout>
    <x-slot name="header">
        <h2>Dashboard</h2>
    </x-slot>
    
    <p>Dashboard content here</p>
</x-app-layout>
```

### 4.4 Validation Mechanisms

#### Form Request Classes
```php
class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 
                        Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'email.unique' => 'This email is already taken.',
        ];
    }
}
```

#### Controller Validation
```php
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'selected_fruits' => 'required|array|min:1',
        'selected_fruits.*' => 'integer|min:1|max:5',
        'size' => 'required|in:small,medium,large',
        'sugar_level' => 'required|in:none,low,medium,high',
        'add_protein' => 'boolean',
        'add_vitamins' => 'boolean',
    ]);
}
```

---

## 🛒 5. Key Project Features

### 5.1 Multi-Role User System

#### Role Definitions
```php
// User roles with specific capabilities
const ROLES = [
    'admin' => [
        'dashboard_access' => true,
        'user_management' => true,
        'product_management' => true,
        'order_oversight' => true,
        'fruit_inventory' => true,
        'employee_management' => true,
    ],
    'employee' => [
        'dashboard_access' => true,
        'order_management' => true,
        'status_updates' => true,
        'customer_service' => true,
    ],
    'customer' => [
        'browse_products' => true,
        'create_custom_juices' => true,
        'shopping_cart' => true,
        'order_placement' => true,
        'order_tracking' => true,
    ]
];
```

#### Admin Capabilities
```php
class AdminController extends Controller
{
    // User management
    public function users() {
        return User::with('orders')->paginate(20);
    }
    
    // Product management
    public function products() {
        return Product::withCount('orderItems')->get();
    }
    
    // System analytics
    public function analytics() {
        return [
            'total_users' => User::count(),
            'total_orders' => Order::count(),
            'revenue' => Order::where('status', 'completed')->sum('total'),
        ];
    }
}
```

### 5.2 Shopping Cart System

#### Cart Operations
```php
class CartController extends Controller
{
    // Add product to cart
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity ?? 1;

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
        }

        $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');
        
        return response()->json([
            'success' => true,
            'message' => "{$product->name} added to cart!",
            'cart_count' => $cartCount
        ]);
    }
    
    // Update cart item quantity
    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate(['quantity' => 'required|integer|min:1|max:99']);
        
        $cartItem->update(['quantity' => $request->quantity]);
        
        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully!'
        ]);
    }
}
```

#### Dynamic Pricing Calculations
```php
// Cart totals with delivery and tax
public function index()
{
    $cartItems = CartItem::with(['product', 'customJuice'])
        ->where('user_id', Auth::id())
        ->get();

    $subtotal = $cartItems->sum('total_price');
    $deliveryFee = $subtotal >= 7500 ? 0 : 1497; // Free delivery over LKR 7,500
    $tax = $subtotal * 0.08; // 8% tax
    $total = $subtotal + $deliveryFee + $tax;

    return view('cart', compact('cartItems', 'subtotal', 'deliveryFee', 'tax', 'total'));
}
```

### 5.3 Custom Juice Creation System

#### Recipe Builder Logic
```php
class CustomizeJuiceController extends Controller
{
    public function store(Request $request)
    {
        // Calculate base price from selected fruits
        $fruitIds = array_keys($request->selected_fruits);
        $fruits = Fruit::whereIn('id', $fruitIds)->get()->keyBy('id');
        
        $basePrice = 0;
        $fruitNames = [];
        
        foreach ($request->selected_fruits as $fruitId => $quantity) {
            if ($fruits->has($fruitId)) {
                $fruit = $fruits[$fruitId];
                $basePrice += $fruit->price_per_serving * $quantity;
                $fruitNames[] = $fruit->name;
            }
        }

        // Apply size multipliers
        $sizeMultipliers = ['small' => 0.8, 'medium' => 1.0, 'large' => 1.3];
        $totalPrice = $basePrice * $sizeMultipliers[$request->size];

        // Add-on pricing in LKR
        if ($request->add_protein) $totalPrice += 600; // LKR 600
        if ($request->add_vitamins) $totalPrice += 450; // LKR 450

        // Calculate dominant color for visual representation
        $dominantColor = $this->calculateDominantColor($request->selected_fruits, $fruits);

        // Create custom juice record
        $customJuice = CustomJuice::create([
            'name' => $request->name,
            'selected_fruits' => $request->selected_fruits,
            'size' => $request->size,
            'sugar_level' => $request->sugar_level,
            'ice_level' => $request->ice_level,
            'add_protein' => $request->boolean('add_protein'),
            'add_vitamins' => $request->boolean('add_vitamins'),
            'total_price' => $totalPrice,
            'dominant_color' => $dominantColor,
            'user_id' => Auth::id()
        ]);

        return response()->json([
            'success' => true,
            'message' => "Your custom juice '{$request->name}' has been created!",
            'juice' => [
                'id' => $customJuice->id,
                'name' => $request->name,
                'total_price' => number_format($totalPrice, 0),
                'color' => $dominantColor
            ]
        ]);
    }
}
```

#### Color Mixing Algorithm
```php
private function calculateDominantColor($selectedFruits, $fruits)
{
    $colors = [];
    $totalQuantity = 0;
    
    // Collect colors and weights
    foreach ($selectedFruits as $fruitId => $quantity) {
        if ($fruits->has($fruitId)) {
            $colors[] = [
                'color' => $fruits[$fruitId]->color,
                'weight' => $quantity
            ];
            $totalQuantity += $quantity;
        }
    }

    // Find dominant color (highest quantity)
    $dominantColor = '#ff6b35'; // fallback orange
    $maxWeight = 0;
    
    foreach ($colors as $colorData) {
        if ($colorData['weight'] > $maxWeight) {
            $maxWeight = $colorData['weight'];
            $dominantColor = $colorData['color'];
        }
    }

    return $dominantColor;
}
```

### 5.4 Order Management System

#### Order Processing Workflow
```php
class PaymentController extends Controller
{
    public function process(Request $request)
    {
        try {
            // Process payment with Stripe
            $paymentIntent = PaymentIntent::create([
                'amount' => round($total * 100), // Convert to cents
                'currency' => 'usd',
                'payment_method' => $request->payment_method_id,
                'confirm' => true,
            ]);

            // Create order record
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'JB-' . strtoupper(uniqid()),
                'billing_name' => $billingData['name'],
                'billing_email' => $billingData['email'],
                'subtotal' => $subtotal,
                'tax' => $tax,
                'delivery_fee' => $deliveryFee,
                'total' => $total,
                'status' => 'confirmed',
                'payment_intent_id' => $paymentIntent->id,
            ]);

            // Create order items
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'custom_juice_id' => $cartItem->custom_juice_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->total_price / $cartItem->quantity,
                ]);
            }

            // Award loyalty points
            $pointsEarned = floor($total / 100); // 1 point per LKR 100
            Auth::user()->addPoints($pointsEarned);

            // Clear cart
            CartItem::where('user_id', Auth::id())->delete();

            return response()->json(['success' => true, 'order_id' => $order->id]);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Payment failed'], 400);
        }
    }
}
```

#### Status Tracking System
```php
// Order status progression
const ORDER_STATUSES = [
    'pending' => 'Order received, awaiting confirmation',
    'confirmed' => 'Order confirmed, preparing ingredients',
    'preparing' => 'Juices being prepared',
    'ready' => 'Order ready for pickup/delivery',
    'delivered' => 'Order successfully delivered',
    'cancelled' => 'Order cancelled'
];

// Employee order management
class EmployeeOrderController extends Controller
{
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,preparing,ready,delivered,cancelled'
        ]);

        $order->update([
            'status' => $request->status,
            'status_updated_at' => now(),
            'updated_by_employee' => Auth::user()->name
        ]);

        return response()->json([
            'success' => true,
            'message' => "Order #{$order->id} status updated to {$request->status}"
        ]);
    }
}
```

### 5.5 Payment Integration

#### Stripe Configuration
```php
class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function createPaymentIntent(Request $request)
    {
        $amount = $request->amount * 100; // Convert to cents
        
        $intent = PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'usd',
            'automatic_payment_methods' => ['enabled' => true],
        ]);

        return response()->json([
            'client_secret' => $intent->client_secret
        ]);
    }
}
```

#### Currency Conversion (USD to LKR)
```php
// All prices converted to LKR with 300x multiplier
const USD_TO_LKR_RATE = 300;

// Product pricing in LKR
class Product extends Model
{
    public function getPriceInLKRAttribute()
    {
        return $this->price * self::USD_TO_LKR_RATE;
    }
}

// Delivery fee calculations in LKR
public function calculateDeliveryFee($subtotal)
{
    return $subtotal >= 7500 ? 0 : 1497; // LKR 1,497 delivery fee
}

// Add-on pricing in LKR
const PROTEIN_ADDON_LKR = 600;   // LKR 600 for protein
const VITAMINS_ADDON_LKR = 450;  // LKR 450 for vitamins
```

### 5.6 Real-time Features

#### AJAX Cart Updates
```javascript
// Real-time cart updates without page refresh
function addToCart(productId, quantity = 1) {
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: quantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartCount(data.cart_count);
            showNotification(data.message, 'success');
        }
    });
}

// Visual feedback for cart updates
function updateCartCount(count) {
    const cartElement = document.getElementById('header-cart-count');
    if (cartElement) {
        cartElement.style.transform = 'scale(1.2)';
        cartElement.textContent = `Cart (${count})`;
        
        setTimeout(() => {
            cartElement.style.transform = 'scale(1)';
        }, 300);
    }
}
```

---

## 💡 Common Viva Questions & Answers

### Q1: "Explain the MVC architecture in your project"
**Answer**: 
- **Models**: Handle data operations (User, Product, Order models with Eloquent ORM)
- **Views**: Blade templates for presentation (welcome.blade.php, cart.blade.php with Tailwind CSS)
- **Controllers**: Business logic coordination (CartController handles cart operations, AdminController manages admin functions)

### Q2: "What OOP principles did you implement?"
**Answer**:
1. **Inheritance**: All controllers extend base Controller, models extend Laravel Model
2. **Encapsulation**: Protected model attributes, private controller methods
3. **Polymorphism**: CartItem handles both Product and CustomJuice objects
4. **Abstraction**: Laravel contracts and interfaces

### Q3: "Describe your database relationships"
**Answer**:
- **One-to-Many**: User→Orders, Order→OrderItems, User→CartItems
- **Many-to-Many**: User↔Products (favorites), User↔CustomJuices (favorites)
- **Foreign Keys**: Proper constraints with cascade deletes for data integrity

### Q4: "How does session management work?"
**Answer**:
- **Authentication**: Laravel Sanctum with session-based auth
- **Middleware**: Role-based access control (admin, employee, customer)
- **Session Storage**: Cart persistence, billing data, user preferences
- **Security**: CSRF protection, session regeneration on login

### Q5: "What are the key features of your system?"
**Answer**:
1. **Multi-role system** with distinct capabilities
2. **Dynamic cart** with real-time updates
3. **Custom juice builder** with pricing algorithm
4. **Payment processing** with Stripe integration
5. **Currency conversion** from USD to LKR
6. **Order tracking** with status management

---

## 🚀 Technical Highlights to Emphasize

### Advanced Database Design
- **Normalized schema** with proper relationships
- **JSON columns** for flexible data (ingredients, selected_fruits)
- **Indexes** for performance optimization
- **Constraints** for data integrity

### Security Implementation
- **CSRF protection** on all forms
- **Input validation** at multiple layers
- **SQL injection prevention** via Eloquent ORM
- **Password hashing** with bcrypt
- **Role-based authorization** middleware

### Performance Optimizations
- **Eager loading** relationships to prevent N+1 queries
- **Database indexing** on frequently queried columns
- **Caching** for product listings and user sessions
- **AJAX** for dynamic updates without page refresh

### Business Logic Implementation
- **Dynamic pricing** based on ingredients and size
- **Loyalty points system** for customer retention
- **Delivery fee calculations** with thresholds
- **Tax calculations** and currency conversion

---

## 📊 Project Statistics

### Codebase Metrics
- **Total Files**: 50+ PHP files
- **Lines of Code**: 5000+ lines
- **Database Tables**: 8 main tables + pivot tables
- **API Endpoints**: 20+ RESTful routes
- **User Interfaces**: 15+ responsive pages

### Feature Completeness
- ✅ User authentication and authorization
- ✅ Product catalog with search and filtering
- ✅ Shopping cart with persistent storage
- ✅ Custom juice creation with visual feedback
- ✅ Payment processing with Stripe
- ✅ Order management and tracking
- ✅ Admin panel with full CRUD operations
- ✅ Employee dashboard for order processing
- ✅ Responsive design for mobile/desktop

---

## 🎯 Demonstration Flow for Viva

### 1. System Overview (2 minutes)
- Show homepage with product catalog
- Explain three user roles and their access levels

### 2. Customer Journey (5 minutes)
- User registration/login process
- Browse products and add to cart
- Create custom juice with dynamic pricing
- Checkout process with payment

### 3. Employee Functions (3 minutes)
- Employee dashboard
- Order management and status updates
- Order tracking and customer service

### 4. Admin Capabilities (3 minutes)
- Admin dashboard with analytics
- User management (CRUD operations)
- Product management
- System oversight

### 5. Technical Deep Dive (5 minutes)
- Database relationships demonstration
- Code walkthrough of key OOP concepts
- Session management and security features

---

## 🏆 Conclusion

This Laravel Juice Bar E-Commerce project demonstrates:

### Technical Proficiency
- **Full-stack development** with Laravel framework
- **Object-oriented programming** principles implementation
- **Database design** with normalized relationships
- **Security best practices** and session management

### Business Understanding
- **E-commerce workflows** from browsing to delivery
- **Multi-stakeholder system** serving different user types
- **Real-world features** like payments, inventory, and loyalty

### Problem-solving Skills
- **Custom solutions** for juice recipe builder
- **Performance optimization** for cart operations
- **User experience** considerations in design

**This project showcases enterprise-level web development skills suitable for professional deployment.**

---

*Generated for Viva Preparation - Laravel Juice Bar E-Commerce Project*
*Total preparation time recommended: 2-3 hours of review*