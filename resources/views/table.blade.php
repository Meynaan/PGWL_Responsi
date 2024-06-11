@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header">
                <h3>Data Mahasiswa</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Yaya</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Olav</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Dedek</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Putih</td>
                            <td>B</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Piko</td>
                            <td>B</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Una</td>
                            <td>B</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Dori</td>
                            <td>B</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Marvel</td>
                            <td>A</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
