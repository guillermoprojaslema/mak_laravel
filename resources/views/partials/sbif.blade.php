<div class="card nav-transparent">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-2"> Indicadores Económicos {{\Carbon\Carbon::parse($sbif->updated_at)->format('d-m-Y H:i:s')}}
                </div>
                <div class="col-md-2"> Dólar: $ {{number_format($sbif->dolar, 0, ',', '.')}}
                </div>
                <div class="col-md-2"> Euro: $ {{number_format($sbif->euro, 0, ',', '.')}}
                </div>
                <div class="col-md-2"> UF: $ {{number_format($sbif->uf, 0, ',', '.')}}
                </div>
                <div class="col-md-2"> UTM: $ {{number_format($sbif->utm, 0, ',', '.')}}
                </div>
                <div class="col-md-2"> IPC: {{number_format($sbif->ipc, 2, ',', '.')}} %
                </div>
            </div>
        </div>
    </div>
</div>