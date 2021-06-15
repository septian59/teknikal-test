<div class="d-flex">
<a href="{{route('team.edit', $model)}}" class="btn btn-warning mr-2">Edit</a>
<button href="{{route('team.destroy', $model)}}" class="btn btn-danger" id="delete">Delete</button>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('button#delete').on('click', function(e){
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
        title: 'Apakah kamu yakin hapus data ini?',
        text: "Data yang di hapus akan masuk ke recyle !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteTeam').action = href;
            document.getElementById('deleteTeam').submit();
            Swal.fire(
            'Terhapus!',
            'Data kamu sudah masuk recyle.',
            'success'
            )
        }
        })
      
    })

    
</script>


