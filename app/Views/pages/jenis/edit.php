<?= $this->extend('pages/layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="w3-container w3-white">
    <h3>Ubah Jenis Barang</h3>
</div>
<div class="w3-container w3-white w3-padding-16" ng-app="jenisApp" ng-controller="jenisCtrl">
    <div class="w3-row-padding">
        <div class="w3-margin-bottom">
            <label>Nama</label>
            <input type="hidden" ng-model="id" ng-value="id">
            <input class="w3-input w3-border" type="text" name="nama" required ng-model="nama" ng-value="nama">
        </div>
    </div>
    <div class="w3-row-padding">
        <button class="w3-button w3-green" type="button" ng-click="simpan()">Simpan</button>
        <button class="w3-button w3-grey" type="button" ng-click="kembali()">Kembali</button>
    </div>
</div>

<script type="text/javascript">
    var app = angular.module('jenisApp', []);
    app.controller('jenisCtrl',function($scope,$http){
        $scope.id = '<?= $id ?>';
        $scope.nama = '<?= $nama ?>';

        $scope.kembali = function(){
            window.location.assign("/fjenis")
        };

        $scope.simpan = function(){
            var data  = {
                nama: $scope.nama
            };
            $http.put('/jenis/'+$scope.id, JSON.stringify(data)).then(function (response){
                $scope.kembali();
            });
        };
    });
</script>

<?= $this->endSection(); ?>