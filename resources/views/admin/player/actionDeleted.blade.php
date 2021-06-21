<div class="d-flex flex-column">
<a href="{{route('player.restore', $model)}}" class="btn btn-info mb-2">Restore</a>
<button href="{{route('player.force', $model)}}" class="btn btn-danger" id="deletePerm">Delete Permanen</button>
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
            document.getElementById('deletePlayerPerm').action = href;
            document.getElementById('deletePlayerPerm').submit();
            Swal.fire(
            'Terhapus!',
            'Data kamu sudah terhapus permanen.',
            'success'
            )
        }
        })
      
    })
</script>
