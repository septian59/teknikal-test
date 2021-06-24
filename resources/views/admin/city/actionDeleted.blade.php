<div class="d-flex">
<a href="{{route('city.restore', $model)}}" class="btn btn-info mr-2">Restore</a>
<button href="{{route('city.force', $model)}}" class="btn btn-danger" id="deletePerm">Delete Permanen</button>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('button#deletePerm').on('click', function(e){
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
        title: 'Apakah kamu yakin hapus data ini?',
        text: "Data yang di hapus akan hilang permanen !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deletePermanen').action = href;
            document.getElementById('deletePermanen').submit();
            Swal.fire(
            'Terhapus!',
            'Data kamu sudah terhapus permanen.',
            'success'
            )
        }
        })
      
    })
</script>
