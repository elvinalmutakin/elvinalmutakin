<?= $this->extend('pages/layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="w3-container w3-white">
    <h3>Ubah Jenis Barang</h3>
</div>
<div class="w3-container w3-white w3-padding-16" ng-app="barangApp" ng-controller="barangCtrl">
    <div class="w3-row-padding">
        <div class="w3-margin-bottom">
            <label>Jenis</label>
            <select class="w3-select" ng-model="id_jenis" required>
                <option ng-repeat="j in jenis" value="{{j.id}}" {{if ng-value=j.id ? selected }}>{{j.nama}}</option>
            </select>
        </div>
        <div class="w3-margin-bottom">
            <label>Nama</label>
            <input class="w3-input w3-border" type="text" required ng-model="barang.nama" ng-model="nama" ng-value="nama">
        </div>
    </div>
    <div class="w3-row-padding">
        <button class="w3-button w3-green" type="button" ng-click="simpan()">Simpan</button>
        <button class="w3-button w3-grey" type="button" ng-click="kembali()">Kembali</button>
    </div>
</div>

<script type="text/javascript">
    var app = angular.module('barangApp', []);
    app.controller('barangCtrl',function($scope,$http){
        $scope.getjenis = function(){
            $http.get("/jenis")
            .then(function(response) {
                $scope.jenis = response.data;
            });
        }
        $scope.getjenis();
        $scope.id = '<?= $id ?>';
        $scope.id_jenis = '<?= $id_jenis ?>';
        $scope.nama = '<?= $nama ?>';
        $scope.kembali = function(){
            window.location.assign("/fbarang")
        };
        $scope.simpan = function(){
            var data  = {
                id_jenis: $scope.id_jenis,
                nama: $scope.nama
            };
            $http.put('/barang/'+$scope.id, JSON.stringify(data)).then(function (response){
                $scope.kembali();
            });
        };
    });
</script>

<?= $this->endSection(); ?>