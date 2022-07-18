<style>
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .center {
        margin-left: auto;
        margin-right: auto;
    }

    table,
    th,
    td {
        border: 1px solid gray;
    }

    table {
        width: 80%;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        width: 110px
    }

    .text-card {
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        text-align: left;
    }

    .heading {
        background-color: gray;
        color: white;
        padding: 10px 10px;
        font-size: 40px;
    }

    .text-box {
        padding: 10px;
    }

</style>

<table>
    <thead>
        <tr>
            <th>Student Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $datas->full_name }}</td>
        </tr>
        <h4>
            <p>
                Succussfully Register {{ $datas->full_name }} Your Account
            </p>
        </h4>
    </tbody>
</table>
