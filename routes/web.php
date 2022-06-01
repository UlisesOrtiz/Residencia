<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifiedUserRoute;
use App\Http\Controllers\UserController;

/*** Admin components ***/

use App\Http\Livewire\Admin\AdminDashboardComponent;
//Academic
use App\Http\Livewire\Admin\Academic\MyClassComponent;
use App\Http\Livewire\Admin\Academic\SectionComponent;
use App\Http\Livewire\Admin\Academic\SubjectComponent;
//Administrative
use App\Http\Livewire\Admin\Administrative\AdministrativeComponent;
//Payment
use App\Http\Livewire\Admin\Payment\CatalogueComponent;
use App\Http\Livewire\Admin\Payment\CreatePaymentComponent;
use App\Http\Livewire\Admin\Payment\CreatePaymentStudentComponent;
use App\Http\Livewire\Admin\Payment\PaymentManagementComponent;
//Support staff
use App\Http\Livewire\Admin\Incident\IncidentCatalogueComponent;
use App\Http\Livewire\Admin\Incident\CreateIncidentComponent;
use App\Http\Livewire\Admin\Incident\IncidentManagementComponent;
//Students
use App\Http\Livewire\Admin\Student\AddStudentComponent;
use App\Http\Livewire\Admin\Student\ViewSectionComponent;
use App\Http\Livewire\Admin\Student\StudentPromotionComponent;
//Marks
use App\Http\Livewire\Admin\Mark\MarkComponent;
use App\Http\Livewire\Admin\Mark\MarkFinalComponent;
use App\Http\Livewire\Admin\Mark\MarkSectionComponent;
use App\Http\Livewire\Admin\Mark\MarkFinalSectionComponent;
//Report
use App\Http\Livewire\Admin\Report\StudentReportComponent;
use App\Http\Livewire\Admin\Report\SectionReportComponent;
use App\Http\Livewire\Admin\Report\SectionReportFinalComponent;
use App\Http\Livewire\Admin\Report\SectionReportAttendanceComponent;
use App\Http\Controllers\ReportController;
//Marksheet
use App\Http\Livewire\Admin\Marksheet\MarksheetStudentComponent;
use App\Http\Livewire\Admin\Marksheet\MarksheetSectionComponent;
use App\Http\Controllers\MarksheetController;

/*** Student components ***/

use App\Http\Livewire\Student\StudentDashboardComponent;
use App\Http\Livewire\Student\Marksheet\StudentMarksheetComponent;
use App\Http\Livewire\Student\Report\StudentHistoricComponent;
use App\Http\Livewire\Student\Report\StudentIncidentComponent;
use App\Http\Livewire\Student\Report\StudentPaymentComponent;

/*** Teacher components ***/

use App\Http\Livewire\Teacher\TeacherDashboardComponent;
use App\Http\Livewire\Teacher\Mark\TeacherMarkComponent;

/*** Orientation and Financial components ***/

use App\Http\Livewire\Orientation\DashboardOrientationComponent;
use App\Http\Livewire\Financial\DashboardFinancialComponent;


Route::get('/', [VerifiedUserRoute::class, 'index'])->name('welcome');

Route::get('/salir', [VerifiedUserRoute::class, 'logout'])->name('user.logout');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/verificar', [VerifiedUserRoute::class, 'verfied'])
    ->name('verified.user');

Route::middleware(['auth:sanctum', 'verified', 'admin'])
    ->prefix('administrador')
    ->group(
        function () {
            Route::get('/tablero', AdminDashboardComponent::class)->name('admin.dashboard');
            Route::get('/perfil', [UserController::class, 'profile'])->name('admin.profile');

            /***************** Administrative ******************/
            Route::prefix('administrativo')->group(function () {
                Route::get('/administrativos', AdministrativeComponent::class)->name('administrative.administrative');
            });

            /***************** Payment ******************/
            Route::prefix('pagos')->group(function () {
                Route::get('/catalogo', CatalogueComponent::class)->name('payment.catalogue');
                Route::get('/crear', CreatePaymentComponent::class)->name('payment.creation');
                Route::get('/crear/estudiante', CreatePaymentStudentComponent::class)->name('payment.creation.student');
                Route::get('/administracion/pagos', PaymentManagementComponent::class)->name('payment.management');
            });

            /***************** Support staff ******************/
            Route::prefix('orientacion/prefectura')->group(function () {
                Route::get('/catalogo', IncidentCatalogueComponent::class)->name('support.catalogue');
                Route::get('/crear', CreateIncidentComponent::class)->name('support.creation');
                Route::get('/administrar', IncidentManagementComponent::class)->name('support.management');
            });

            /***************** Academics ******************/
            Route::prefix('academicos')->group(function () {
                Route::get('/especialidad', MyClassComponent::class)->name('academics.myclass');
                Route::get('/grupo', SectionComponent::class)->name('academics.section');
                Route::get('/materia', SubjectComponent::class)->name('academics.subject');
            });

            /***************** Students ******************/
            Route::prefix('estudiantes')->group(function () {
                Route::get('/admitir', AddStudentComponent::class)->name('students.admit');
                Route::get('/lista-grupos', ViewSectionComponent::class)->name('students.sections');
                Route::get('/promover', StudentPromotionComponent::class)->name('students.promotion');
            });

            /***************** Marks ******************/
            Route::prefix('calificacion')->group(function () {
                Route::get('/materia', MarkComponent::class)->name('admin.marks');
                Route::get('/materia-finales', MarkFinalComponent::class)->name('admin.marks.final');
                Route::get('/grupo', MarkSectionComponent::class)->name('admin.marks.section');
                Route::get('/grupo-finales', MarkFinalSectionComponent::class)->name('admin.marks.final.section');
            });

            /***************** Reports ******************/
            Route::prefix('reporte')->group(function () {
                Route::get('/alumno', StudentReportComponent::class)->name('report.student');
                Route::get('/historial/{userId}', [ReportController::class, 'index'])->name('report.historic');
                Route::get('/grupo', SectionReportComponent::class)->name('report.section');
                Route::get('/grupo/historial/{sectionId}/{phaseId}', [ReportController::class, 'section'])->name('report.historic.section');
                Route::get('/grupo/final', SectionReportFinalComponent::class)->name('report.section.final');
                Route::get('/grupo/final/{sectionId}/{phaseId}', [ReportController::class, 'sectionFinal'])->name('report.historic.section.final');
                Route::get('/grupo/asistencia', SectionReportAttendanceComponent::class)->name('report.section.attendance');
                Route::get('/grupo/asistencia/{sectionId}/{phaseId}', [ReportController::class, 'sectionAttendance'])->name('report.historic.section.attendance');
            });

            /***************** Marksheet ******************/
            Route::prefix('boleta')->group(function () {
                Route::get('/alumno', MarksheetStudentComponent::class)->name('marksheet.student');
                Route::get('/grupo', MarksheetSectionComponent::class)->name('marksheet.section');
                Route::get('/alumno/{userId}', [MarksheetController::class, 'student'])->name('marksheet.student.print');
                Route::get('/grupo/{sectionId}', [MarksheetController::class, 'section'])->name('marksheet.section.print');
            });
        }
    );


Route::middleware(['auth:sanctum', 'verified'])
    ->prefix('estudiante')
    ->group(
        function () {
            Route::get('/tablero', StudentDashboardComponent::class)->name('student.dashboard');
            Route::get('/perfil', [UserController::class, 'profile'])->name('student.profile');
            Route::get('/boleta', StudentMarksheetComponent::class)->name('student.marksheet');
            Route::get('/historial', StudentHistoricComponent::class)->name('student.historic');
            Route::get('/pagos', StudentPaymentComponent::class)->name('student.historic.payment');
            Route::get('/incidentes', StudentIncidentComponent::class)->name('student.historic.incident');
        }
    );


Route::middleware(['auth:sanctum', 'verified', 'teacher'])
    ->prefix('docente')
    ->group(
        function () {
            Route::get('/tablero', TeacherDashboardComponent::class)->name('teacher.dashboard');
            Route::get('/perfil', [UserController::class, 'profile'])->name('teacher.profile');
            Route::get('/materias', TeacherMarkComponent::class)->name('teacher.marks');
        }
    );

Route::middleware(['auth:sanctum', 'verified', 'orientation'])
    ->prefix('orientacion/prefectura')
    ->group(
        function () {
            Route::get('/tablero', DashboardOrientationComponent::class)->name('orientation.dashboard');
            Route::get('/perfil', [UserController::class, 'profile'])->name('orientation.profile');
            
            Route::prefix('apoyo')->group(function () {
                Route::get('/catalogo', IncidentCatalogueComponent::class)->name('orientation.support.catalogue');
                Route::get('/crear', CreateIncidentComponent::class)->name('orientation.support.creation');
                Route::get('/administrar', IncidentManagementComponent::class)->name('orientation.support.management');
            });
        }
    );

Route::middleware(['auth:sanctum', 'verified', 'financial'])
    ->prefix('financieros')
    ->group(
        function () {

            Route::get('/tablero', DashboardFinancialComponent::class)->name('financial.dashboard');
            Route::get('/perfil', [UserController::class, 'profile'])->name('financial.profile');

            Route::prefix('pagos')->group(function () {
                Route::get('/catalogo', CatalogueComponent::class)->name('financial.payment.catalogue');
                Route::get('/crear', CreatePaymentComponent::class)->name('financial.payment.creation');
                Route::get('/crear/estudiante', CreatePaymentStudentComponent::class)->name('financial.payment.creation.student');
                Route::get('/administracion/pagos', PaymentManagementComponent::class)->name('financial.payment.management');
            });
        }
    );
