<a href="{{route('team.restore', $model)}}" class="btn btn-info">Restore</a>
<button href="{{route('team.force', $model)}}" class="btn btn-danger" id="deletePerm">Delete Permanen</button>

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
            document.getElementById('cityPermanen').action = href;
            document.getElementById('cityPermanen').submit();
            Swal.fire(
            'Terhapus!',
            'Data kamu sudah terhapus permanen.',
            'success'
            )
        }
        })
      
    })
</script>
