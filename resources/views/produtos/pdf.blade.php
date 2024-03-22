<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        table{border:1px solid #666; width:100%; border-collapse: collapse;}
        th, td { border: 1px solid black;}

        .text-center{text-align:center}
    </style>

</head>
<body>
    
    <table>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">CÓDIGO</th>
            <th class="text-center">PRODUTO</th>
            <th class="text-center">CATEGORIA</th>
            <th class="text-center">QTD</th>
            <th class="text-center">DISP</th>
            <th class="text-center">PREÇO</th>
            <th class="text-center">DATA CADASTRO</th>
        </tr>

        @foreach ($produtos as $produto)
            <tr>
                <td class="text-center">{{ $produto->id }}</td>
                <td class="text-center">{{ $produto->codigo }}</td>
                <td class="text-center">{{ $produto->produto }}</td>
                <td class="text-center">{{ $produto->categoria->categoria }}</td>
                <td class="text-center">{{ $produto->quantidade }}</td>
                <td class="text-center">{{ $produto->disponivel ? 'Sim' : 'Não' }}</td>
                <td class="text-center">R$ {{ $produto->preco }}</td>
                <td class="text-center">{{ date('d/m/Y', strtotime($produto->created_at)) }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>