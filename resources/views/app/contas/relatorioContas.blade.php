<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Simcompany</title>
</head>


<body> 

    <div class="text-center">
        <h1>Relatório de Contas</h1>
    </div>    
    <br />
    <br />

    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th width="5%">Nº da Conta</th>
                <th>Tipo de Conta</th>
                <th>Saldo Total (R$)</th>
                <!-- <th>Total de Depósitos (R$)</th>
                <th>Total de Saques (R$)</th>
                <th>Data Início</th>
                <th>Data Término</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($contas as $conta)
                <tr>
                    <td style="text-align:center">{{ $conta->id }}</td>
                    <td style="text-align:center">{{ $conta->tipoConta }}</td>
                    <td style="text-align:center">{{ number_format($conta->saldo, 2, ',', '.') }}</td>
                    <!-- <td style="text-align:center">{{ number_format($conta->totalDepositos, 2, ',', '.') }}</td>
                    <td style="text-align:center">{{ number_format($conta->totalSaques, 2, ',', '.') }}</td>                    
                    <td style="text-align:center">{{ date('d/m/Y', strtotime($conta->dataInicio)) }}</td>
                    <td style="text-align:center">{{ date('d/m/Y', strtotime($conta->dataFim)) }}</td>  -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>