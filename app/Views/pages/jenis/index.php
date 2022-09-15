<?= $this->extend('pages/layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="w3-container w3-white">
    <h3>Jenis Barang</h3>
</div>
<div class="w3-container w3-white w3-padding-16">
    <a href="/fjenis/create" class="w3-button w3-teal" type="button">Tambah Data</a>
</div>
<div class="w3-container">
    <div ng-app="jenisApp" ng-controller="jenisCtrl">
        <table class="w3-table-all">
            <thead>
                <tr class="w3-light-grey">
                    <th width="5%">#</th>
                    <th>Nama</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="x in jenis">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ x.nama }}</td>
                    <td>
                        <button ng-click="edit(x.id)" class="w3-button w3-indigo w3-tiny">Ubah</button>
                        <button ng-click="hapus(x.id)" class="w3-button w3-red w3-tiny">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var app = angular.module('jenisApp', []);
    app.controller('jenisCtrl', function($scope, $http) {
        $scope.getjenis = function(){
            $http.get("/jenis")
            .then(function(response) {
                $scope.jenis = response.data;
            });
        }
        $scope.getjenis();

        $scope.hapus = function(id){
            var conf = confirm("Hapus Data?");
            if (conf == true) {
                var data = {
                    id: id,
                };
                $http.delete('/jenis/'+id).then(function (response){
                    window.location.reload();
                });
            }
        };

        $scope.edit = function(id){
            window.location.assign("/fjenis/edit/"+id)
        };
    });
</script>

<?= $this->endSection(); ?>