function editarCliente(obj){
    window.id=obj.getAttribute('data-id')
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'infoCliente/'+window.id,
        type:'get',
        dataType:'json',
        success:function(json){
            let clientes=document.querySelectorAll('#salvarCliente > div > input')
            let count=0
            for(let [key,value] of Object.entries(json)){
                clientes[count].setAttribute('value',value)
                count++
            }
            // clientes[0].setAttribute('value',json.cep)
            // clientes[1].setAttribute('value',json.razao_social)
            // clientes[2].setAttribute('value',json.cnpj)
            // clientes[3].setAttribute('value',json.estado)
            // clientes[4].setAttribute('value',json.municipio)
            // clientes[5].setAttribute('value',json.telefone)
            // clientes[6].setAttribute('value',json.bairro)
            // clientes[7].setAttribute('value',json.rua)
            // clientes[8].setAttribute('value',json.numero)
        }
    })
    $('#editarCliente').modal('show')
}

function salvarCliente(){
    $('#salvarCliente').submit(function(e){
        e.preventDefault()
        var forms=$(this).serialize()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'salvarCliente/'+window.id,
            type:'post',
            dataType:'json',
            data:forms,
            success:function(json){
                if(json.status==0){
                    window.location.href=window.location.href
                }else{
                    alert(json.error)
                }
            }
        })
    })
    $('#enviarCliente').trigger('click')
}

function excluirCliente(obj){
    window.id_cliente=obj.getAttribute('data-id')
    $('#excluirCliente').modal('show')
}

function excluirClienteTrue(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'excluirCliente/'+window.id_cliente,
        type:'delete',
        success:function(){
            window.location.href=window.location.href
        }
    })
}
