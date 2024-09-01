<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HealthCenterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;

// Routes pour les dossiers médicaux
Route::apiResource('medical-records', MedicalRecordController::class);

// Routes pour les rendez-vous médicaux
Route::apiResource('appointments', AppointmentController::class);

// Routes pour les consultations
Route::apiResource('consultations', ConsultationController::class);

// Routes pour les prescriptions médicales
Route::apiResource('prescriptions', PrescriptionController::class);

// Routes pour les documents médicaux
Route::apiResource('documents', DocumentController::class);

// Routes pour les paiements
Route::apiResource('payments', PaymentController::class);

// Routes pour les centres de santé
Route::apiResource('health-centers', HealthCenterController::class);

// Routes pour les notifications
Route::apiResource('notifications', NotificationController::class);

// Routes pour les rapports
Route::apiResource('reports', ReportController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('medical-records', MedicalRecordController::class);
    // Autres routes protégées
});
