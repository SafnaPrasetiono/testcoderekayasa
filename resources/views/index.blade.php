@extends('Layouts.panel')

@section('head')
    <title>Wellcome in dashboard testcode</title>
    <style>
        .dropdown:hover>.dropdown-menu {
            display: block;
        }
    </style>
@endsection

@section('pages')
    <div class="py-5">
        <div class="container">
            <div class="grid gap-6 grid-cols-12">

                <div class="col-span-12 md:col-span-8 order-2 md:order-1">
                    <div class="rounded-xl p-4 bg-white mb-3">
                        <div class="w-full aspect-[21/9]">
                            <canvas id="myChartOne"></canvas>

                        </div>
                    </div>
                    <div class="rounded-xl p-4 bg-white mb-3">
                        @livewire('tasking.input-tasking')
                        <div class="flex g-2 mb-3">
                            <div class="border border-blue-500 text-blue-500 bg-white px-4 py-2 rounded-md">
                                OPEN
                            </div>
                            <div class="ms-2 border border-yellow-500 text-yellow-500 bg-white px-4 py-2 rounded-md">
                                PROGRES
                            </div>
                            <div class="ms-2 border border-green-500 text-green-500 bg-white px-4 py-2 rounded-md">
                                DONE
                            </div>
                            <div class="ms-2 border border-red-500 text-red-500 bg-white px-4 py-2 rounded-md">
                                CANCLE
                            </div>
                        </div>
                        @livewire('tasking.data-tasking')
                    </div>
                </div>

                <div class="col-span-12 md:col-span-4 order-1 md:order-2">
                    <div class="rounded-xl overflow-hidden shadow-lg">
                        <div class="rounded text-center text-white">
                            <div class="py-2 bg-blue-500">
                                <p class="text-xl font-2xl mb-2 font-bold" id="waktu">{{ date('H:i:s') }}</p>
                                <p class="text-xl font-medium">{{ $tanggal }}</p>
                            </div>
                        </div>
                        <div class="flex-row">
                            {{-- @dd($jadwal["imsak"]) --}}
                            @foreach ($jadwal as $key => $adzan)
                                <div
                                    class="flex p-3 @if ($loop->iteration % 2 == 0) bg-orange-50 @else bg-blue-50 @endif">
                                    <p class="me-auto mb-0 capitalize">{{ $key }}</p>
                                    <p class="ms-auto mb-0">{{ $adzan }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            currentHours = waktu.getHours();
            currentHours = ("0" + currentHours).slice(-2);
            currentMinuts = waktu.getMinutes();
            currentMinuts = ("0" + currentMinuts).slice(-2);
            currentSecond = waktu.getSeconds();
            currentSecond = ("0" + currentSecond).slice(-2);
            $('#waktu').html(currentHours + ":" + currentMinuts + ":" + currentSecond);
            // document.getElementById("jam").innerHTML = waktu.getHours();
            // document.getElementById("menit").innerHTML = waktu.getMinutes();
            // document.getElementById("detik").innerHTML = waktu.getSeconds();
        }
    </script>
    <script>
        // this for char one type bar
        var ctx = document.getElementById('myChartOne').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2023', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Chart Test Code',
                    data: [4, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
