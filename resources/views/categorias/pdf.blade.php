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
            <th class="text-center">CATEGORIA</th>
            <th class="text-center">DESCRIÇÃO</th>
            <th class="text-center">DATA CADASTRO</th>
        </tr>

        @foreach ($categorias as $categoria)
            <tr>
                <td class="text-center">{{ $categoria->id }}</td>
                <td class="text-center">{{ $categoria->categoria }}</td>
                <td class="text-center">{{ $categoria->descricao }}</td>
                <td class="text-center">{{ date('d/m/Y', strtotime($categoria->created_at)) }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>