<?= $this->extend('pages/layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="w3-container w3-white">
    <h3>Tambah Transaksi</h3>
</div>
<div class="w3-container w3-white w3-padding-16" ng-app="transaksiApp" ng-controller="transaksiCtrl">
    <div class="w3-row-padding">
        <!-- <div class="w3-margin-bottom">
            <label>Tanggal</label>
            <input class="w3-input w3-border" type="date" required ng-model="transaksi.tanggal">
        </div> -->
        <div class="w3-margin-bottom">
            <label>Barang</label>
            <select class="w3-select" ng-model="transaksi.id_barang" required>
                <option ng-repeat="j in barang" value="{{j.id}}">{{j.nama}}</option>
            </select>
        </div>
        <div class="w3-margin-bottom">
            <label>Jenis Transaksi</label>
            <select class="w3-select" ng-model="transaksi.jenis" required>
                <option value="Pembelian">Pembelian</option>
                <option value="Penjualan">Penjualan</option>
            </select>
        </div>
        <div class="w3-margin-bottom">
            <label>Jumlah</label>
            <input class="w3-input w3-border" type="number" required ng-model="transaksi.jumlah">
        </div>
    </div>
    <div class="w3-row-padding">
        <button class="w3-button w3-green" type="button" ng-click="simpan()">Simpan</button>
    </div>
</div>

<script type="text/javascript">
    var app = angular.module('transaksiApp', []);
    app.controller('transaksiCtrl',function($scope,$http){
        $scope.getbarang = function(){
            $http.get("/barang")
            .then(function(response) {
                $scope.barang = response.data;
            });
        }
        $scope.getbarang();
        $scope.kembali = function(){
            window.location.assign("/ftransaksi")
        };
        $scope.simpan = function(){
            var data  = {transaksi: $scope.transaksi};
            $http.post('/transaksi', JSON.stringify(data)).then(function (response){
                alert("Transaksi tersimpan");
                $scope.kembali();
            });
        };
    });
</script>

<?= $this->endSection(); ?>