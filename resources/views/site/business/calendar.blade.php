@extends('layouts.app')
@section('title', 'Calendario de Regalos')
@section('content')
<section class="row calendar-page mt-5">
    <div class="col-12 calendar-container mt-5">
        <div class="calendar-header">
            <div class="calendar-header-left">
                <h2 class="calendar-title">Calendario de Regalos</h2>
                <span class="badge rounded-pill calendar-total-badge">Total pedidos: {{ $projects->count() }}</span>
            </div>
        </div>

        <div class="calendar-card">
            <div class="calendar-grid">
                <div class="calendar-grid-left">
                    <div class="calendar-controls">
                        <button id="prevMonth" type="button" class="calendar-nav-btn" aria-label="Mes anterior">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <h3 id="calendarMonthLabel" class="calendar-month-label"></h3>
                        <button id="nextMonth" type="button" class="calendar-nav-btn" aria-label="Mes siguiente">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>

                    <div class="calendar-weekdays">
                        <span>D</span><span>L</span><span>M</span><span>M</span><span>J</span><span>V</span><span>S</span>
                    </div>

                    <div id="calendarDays" class="calendar-days"></div>
                </div>

                <div class="calendar-grid-right">
                    <h4 id="selectedDateTitle" class="selected-date-title"></h4>
                    <div id="projectsByDate" class="project-list">
                        @foreach($selectedProjects as $project)
                            @php
                                $firstProduct = $project->productos->first();
                            @endphp
                            <a class="project-card" href="{{ route('pedidosempresa.show', $project->encode_id) }}">
                                <div class="project-card-info">
                                    <strong>{{ $firstProduct->producto ?? 'Proyecto sin producto' }}</strong>                                    
                                    <small>{{ $project->customer }}</small>
                                </div>
                                <span class="project-card-btn">Ver</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@php
$projectsByDate = $projects->groupBy(function ($project) {
    return \Carbon\Carbon::parse($project->date_shopping)->format('Y-m-d');
})->map(function ($items) {
    return $items->map(function ($project) {
        $firstProduct = optional($project->productos->first());

        return [
            'title' => $firstProduct->producto ?? 'Proyecto sin producto',
            'order' => $project->no_project,
            'customer' => $project->customer,
            'url' => route('pedidosempresa.show', $project->encode_id),
        ];
    })->values();
});
@endphp
@endsection

@push('styles')
<style>
    .calendar-page { background: #eff1f5; min-height: calc(100vh - 90px); padding: 2.25rem 0 2.5rem; }
    .calendar-container { padding: 0 54px; }
    .calendar-header { margin-bottom: 1.25rem; }
    .calendar-header-left { display: flex; align-items: center; gap: 1rem; flex-wrap: wrap; }
    .calendar-title { color: #241f7a; font-size: 25px; line-height: 1; margin: 0; font-weight: 800; }
    .calendar-total-badge { font-size: .9rem; border: 1px solid #d9ddff; background: #ecefff; color: #4348d9; padding: .38rem .9rem; font-weight: 700; }
    .calendar-card { background: #fff; border: 1px solid #e3e4e8; border-radius: 1.8rem; padding: 1.2rem; box-shadow: 0 2px 12px rgba(16,24,40,.04); }
    .calendar-grid { display: grid; grid-template-columns: 1.2fr 1fr; gap: 1.5rem; }
    .calendar-grid-left { border-right: 1px solid #ececf1; padding: 25px 85px; }
    .calendar-controls { display: flex; align-items: center; justify-content: center; gap: 1rem; margin-bottom: 1rem; }
    .calendar-month-label { margin: 0; color: #24212d; font-size: 1.7rem; font-weight: 700; min-width: 250px; text-align: center; text-transform: capitalize; }
    .calendar-nav-btn { width: 36px; height: 36px; border-radius: 50%; border: none; background: #f3f4f8; color: #4f5564; }
    .calendar-weekdays { display: grid; grid-template-columns: repeat(7, 1fr); text-align: center; color: #8b8f99; font-weight: 700; margin-bottom: .6rem; }
    .calendar-days { display: grid; grid-template-columns: repeat(7, minmax(0, 1fr)); gap: .4rem; }
    .calendar-day { min-height: 67px; border-radius: 60px; border: 1px solid transparent; background: #fff; position: relative; font-weight: 700; color: #4e5462; }
    .calendar-day:hover { border-color: #d6daf9; background: #f9faff; }
    .calendar-day-muted { color: #c0c3cc; cursor: default; }
    .calendar-day-selected { background: #2f67d8; color: #fff; }
    .calendar-day-number { position: absolute; top: 15px; left: 10px; }
    .calendar-day-count { position: absolute; top: 0px; right: 8px; min-width: 22px; height: 22px; border-radius: 999px; background: #dce4ff; color: #3558b5; font-size: .78rem; display: inline-flex; align-items: center; justify-content: center; padding: 0 .38rem; }
    .calendar-day-selected .calendar-day-count { background: #ffffff; color: #2f67d8; }
    .calendar-grid-right { padding: 25px 40px; }
    .selected-date-title { color: #62718b; margin-bottom: 1rem; font-weight: 800; text-transform: capitalize; font-size: 18px; }
    .project-list { display: flex; flex-direction: column; gap: .85rem; max-height: 490px; overflow: auto; }
    .project-card { background: #edf1ff; border: 1px solid #dde3fb; border-radius: 14px; padding: .9rem; display: flex; justify-content: space-between; align-items: center; text-decoration: none; }
    .project-card strong { display: block; font-size: 16px; color: #262c88; line-height: 1.1; }
    .project-card small { display: block; color: #49526a; font-weight: 600; }
    .project-card-btn { background: #fff; color: #2c3394; border-radius: 10px; padding: .3rem .8rem; font-weight: 800; }
    .empty-state { color: #8f95a5; font-weight: 600; font-size: 12px;}

    @media (max-width: 992px) {
        .calendar-container { padding: 0 18px; }
        .calendar-grid { grid-template-columns: 1fr; }
        .calendar-grid-left { border-right: none; border-bottom: 1px solid #ececf1; padding-right: 0; padding-bottom: 1.2rem; }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateCounts = @json($calendarCounts);
        const projectsByDate = @json($projectsByDate);

        const calendarDays = document.getElementById('calendarDays');
        const monthLabel = document.getElementById('calendarMonthLabel');
        const selectedDateTitle = document.getElementById('selectedDateTitle');
        const projectsContainer = document.getElementById('projectsByDate');

        let selectedDate = '{{ $selectedDate }}';
        let currentMonth = new Date(selectedDate + 'T00:00:00');

        function formatDateKey(dateObj) {
            const year = dateObj.getFullYear();
            const month = String(dateObj.getMonth() + 1).padStart(2, '0');
            const day = String(dateObj.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        function formatHumanDate(dateKey) {
            const dateObj = new Date(dateKey + 'T00:00:00');
            return new Intl.DateTimeFormat('es-CO', { day: 'numeric', month: 'long', year: 'numeric' }).format(dateObj);
        }

        function renderProjects() {
            selectedDateTitle.textContent = `Regalos ${formatHumanDate(selectedDate)}`;
            const projects = projectsByDate[selectedDate] || [];

            if (!projects.length) {
                projectsContainer.innerHTML = '<p class="empty-state">No hay pedidos programados para esta fecha.</p>';
                return;
            }

            projectsContainer.innerHTML = projects.map((project) => `
                <a class="project-card" href="${project.url}">
                    <div class="project-card-info">
                        <strong>${project.title}</strong>
                        <small>${project.customer || ''}</small>
                    </div>
                    <span class="project-card-btn">Ver</span>
                </a>
            `).join('');
        }

        function renderCalendar() {
            const year = currentMonth.getFullYear();
            const month = currentMonth.getMonth();

            monthLabel.textContent = new Intl.DateTimeFormat('es-CO', { month: 'long', year: 'numeric' }).format(currentMonth);

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const startWeekDay = firstDay.getDay();
            const totalDays = lastDay.getDate();

            const days = [];
            for (let i = 0; i < startWeekDay; i++) {
                days.push('<div class="calendar-day calendar-day-muted"></div>');
            }

            for (let day = 1; day <= totalDays; day++) {
                const dateObj = new Date(year, month, day);
                const dateKey = formatDateKey(dateObj);
                const count = dateCounts[dateKey] || 0;
                const selectedClass = dateKey === selectedDate ? 'calendar-day-selected' : '';

                days.push(`
                    <button type="button" class="calendar-day ${selectedClass}" data-date="${dateKey}">
                        <span class="calendar-day-number">${day}</span>
                        ${count ? `<span class="calendar-day-count">${count}</span>` : ''}
                    </button>
                `);
            }

            calendarDays.innerHTML = days.join('');
            calendarDays.querySelectorAll('.calendar-day[data-date]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    selectedDate = btn.dataset.date;
                    renderCalendar();
                    renderProjects();
                });
            });
        }

        document.getElementById('prevMonth').addEventListener('click', function() {
            currentMonth = new Date(currentMonth.getFullYear(), currentMonth.getMonth() - 1, 1);
            renderCalendar();
        });

        document.getElementById('nextMonth').addEventListener('click', function() {
            currentMonth = new Date(currentMonth.getFullYear(), currentMonth.getMonth() + 1, 1);
            renderCalendar();
        });

        renderCalendar();
        renderProjects();
    });
</script>
@endpush
