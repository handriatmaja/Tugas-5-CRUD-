@extends('layout.app') 

@section('title', 'Dashboard Statistik Mata Kuliah')

@section('content')
<div class="container mt-5">
    <h1 class="mb-5">TUGAS CRUD WEB DEVELOPMENT</h1>

    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Distribusi Beban Mata Kuliah per Dosen</h5>
                </div>
                <div class="card-body">
                    <canvas id="mataKuliahChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Memasukkan Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<script>
    // Mendaftarkan plugin secara global
    Chart.register(ChartDataLabels);

    const dataFromController = @json($chartData);
    const ctx = document.getElementById('mataKuliahChart').getContext('2d');
    
    // Konfigurasi Chart
    const mataKuliahChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dataFromController.labels, 
            datasets: [{
                label: 'Jumlah Mata Kuliah',
                data: dataFromController.data, 
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 
                    'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)', 
                    'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)', 
                    'rgba(199, 199, 199, 0.6)', 'rgba(83, 109, 254, 0.6)',
                    'rgba(180, 255, 150, 0.6)', 'rgba(255, 120, 190, 0.6)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Jumlah Mata Kuliah' },
                    ticks: { precision: 0 }
                },
                x: {
                    // Sembunyikan sumbu X karena label nama sudah ada di dalam bar
                    display: false, 
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: { enabled: true },
                
                // KONFIGURASI DATALABELS BARU
                datalabels: {
                    rotation:-90,
                    // Hanya gunakan satu label: Nama Dosen
                    labels: {
                        name: {
                            color: '#000', // Warna teks hitam
                            font: { 
                                weight: 'bold',
                                size: 10
                            },
                            // Fungsi untuk mengambil Nama Dosen
                            formatter: (value, context) => {
                                return context.chart.data.labels[context.dataIndex]; 
                            },
                            // Posisikan label di tengah bar
                            anchor: 'center', 
                            align: 'center',
                            // Tambahkan offset untuk memisahkan baris nama (jika nama terlalu panjang)
                            // Anda bisa mengatur ini jika nama dosen terlalu panjang dan bertabrakan.
                            offset: 0 
                        }
                    }
                }
            }
        }
    });
</script>
@endsection