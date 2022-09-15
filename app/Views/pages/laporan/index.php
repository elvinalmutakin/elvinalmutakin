<?= $this->extend('pages/layouts/template'); ?>
<?= $this->section('content'); ?>
<div ng-app="laporanApp" ng-controller="laporanCtrl">
    <div class="w3-container w3-white">
        <h3>Laporan 1</h3>
    </div>
    <div class="w3-row-padding w3-padding-16">
        <div class="w3-third" style="width: 20%">
            <input class="w3-input w3-border" type="date" ng-model="startdate">
        </div>
        <div class="w3-third" style="width: 20%">
            <input class="w3-input w3-border" type="date" ng-model="enddate">
        </div>
        <div class="w3-third" style="width: 20%">
            <select class="w3-select" ng-model="id_barang" required >
                <option value="Semua Barang">Semua Barang</option>
                <option ng-repeat="j in barang" value="{{j.id}}">{{j.nama}}</option>
            </select>
        </div>
        <div class="w3-third" style="width: 20%">
            <button class="w3-button w3-teal" type="button" ng-click="getlaporan()">Cari Data</button>
        </div>
    </div>
    <div class="w3-container">
        <table class="w3-table-all">
            <thead>
                <tr class="w3-light-grey">
                    <th width="5%">#</th>
                    <th>Nama Barang</th>
                    <th>Stock</th>
                    <th>Jenis Transaksi</th>
                    <th>Jumlah</th>
                    <th>Tanggal Transaksi</th>
                    <th>Jenis Barang</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="x in laporan">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ x.barang }}</td>
                    <td>{{ x.stok_akhir }}</td>
                    <td>{{ x.jenis }}</td>
                    <td>{{ x.jumlah }}</td>
                    <td>{{ x.tanggal }}</td>
                    <td>{{ x.jenis_barang }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var app = angular.module('laporanApp', []);
    app.controller('laporanCtrl', function($scope, $http) {
        $scope.getbarang = function(){
            $http.get("/barang")
            .then(function(response) {
                $scope.barang = response.data;
            });
        };
        $scope.getbarang();

        $scope.getlaporan = function(){
            $scope.laporan = null;
            id_barang = $scope.id_barang;
            if(id_barang==undefined){
                id_barang = '';
            }
            startdate = new Date($scope.startdate);
            startdate = startdate.getDate()+"-"+(startdate.getMonth()+1)+"-"+startdate.getFullYear();
            enddate = new Date($scope.enddate);
            enddate = enddate.getDate()+"-"+(enddate.getMonth()+1)+"-"+enddate.getFullYear();
            $http.get("/laporan/search/"+startdate+"/"+enddate+"/"+id_barang)
                .then(function(response) {
                    $scope.laporan = response.data;
                });
            };
    });
</script>

<?= $this->endSection(); ?>