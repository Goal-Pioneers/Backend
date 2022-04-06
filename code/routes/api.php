<?php
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\SubscriptionController;
    use App\Http\Controllers\SubscriptionCategoryController;
    use App\Http\Controllers\MailingListController;

    use App\Models\routes\RoutesAccountAPIModel;

    // 
    Route::controller( AccountController::class )->group( RoutesAccountAPIModel::register() );
?>