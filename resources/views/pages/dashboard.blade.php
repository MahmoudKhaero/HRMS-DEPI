@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'dashboard'])

@section('_content')
<div class="container-fluid mt-3 px-4">
    <!-- Dashboard Header -->
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="font-weight-bold">Dashboard</h4>
            <div>
                <button class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i> Refresh</button>
            </div>
        </div>
    </div>
    <hr>

    <!-- Attendance Alert -->
    @if (!$checkForAttendance)
        <div class="alert alert-warning d-flex align-items-center">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <h5 class="mb-0 font-weight-bold">Don't forget to check in / out!</h5>
        </div>
    @endif

    <!-- Admin Section -->
    @if (auth()->user()->isAdmin())
        <div class="row">
            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body py-5">
                        <h4 class="card-title text-secondary">Total Employees</h4>
                        <h1 class="display-4 text-primary">{{ $employeesCount }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body py-5">
                        <h4 class="card-title text-secondary">Job Applicants</h4>
                        <h1 class="display-4 text-primary">{{ $recruitmentCandidatesCount }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contract Ending Soon -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-danger text-white">
                        <h4 class="font-weight-bold mb-0">Contracts Ending Soon</h4>
                    </div>
                    <div class="card-body p-3 scrollable">
                        <table class="table table-hover table-bordered text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Contract Ends On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($endingEmployees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration + $endingEmployees->firstItem() - 1 }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->end_of_contract }}</td>
                                        <td>
                                            <a href="{{ route('employees-data.edit', ['employee' => $employee->id]) }}"
                                               class="btn btn-outline-danger btn-sm">
                                                Renew
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $endingEmployees->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Announcements Section -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white">
                    <h3 class="font-weight-bold mb-0">Announcements</h3>
                </div>
                <div class="card-body p-3 scrollable">
                    <table class="table table-hover table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Created By</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                                <tr>
                                    <td>{{ $loop->iteration + $announcements->firstItem() - 1 }}</td>
                                    <td>
                                        <a href="{{ route('announcements.show', ['announcement' => $announcement->id]) }}">
                                            {{ $announcement->title }}
                                        </a>
                                    </td>
                                    <td>{{ $announcement->creator->name }}</td>
                                    <td>{{ $announcement->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Application Script -->
    <script>
        const attendancesChart = new Chartisan({
            el: '#attendances-chart',
            url: "@chart('attendances_chart')",
        });

        const performanceChart = new Chartisan({
            el: '#performance-chart',
            url: "@chart('performance_chart')",
        });
    </script>
@endsection
