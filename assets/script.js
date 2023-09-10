//Detcto si clico en algun lápiz de edición.
document.querySelector('main').addEventListener('click',(elemento)=>{
    if(elemento.target.classList.contains('editDatos')){
        //cogemos id (data) del lapiz
        idLapiz = elemento.target.dataset.id;
        console.log(idLapiz);
        //cogemos el contenido del elemento del lapiz clicado
        contenidoItem  = elemento.target.nextElementSibling.innerHTML;
        console.log(contenidoItem);
        //contenidoItem2 = 

        // edicion datos personales
        const formularioDP = document.querySelector('.formDatosEdit');
        formularioDP.style.display = 'block'; 
        formularioDP.dadaPersonal.value = contenidoItem;
        formularioDP.updateDatos.dataset.id = idLapiz;
        
        // edicion competencias
        const formularioC = document.querySelector('.formCompetenciasEdit');
        formularioC.style.display = 'block'; 
        formularioC.nomCompetencia.value = contenidoItem;
        formularioC.updateCompetencia.dataset.id = idLapiz;
        console.log(formularioC.updateCompetencia.dataset.id);

        // edicion perfil
        const formularioP = document.querySelector('.formPerfilEdit');
        formularioP.style.display = 'block'; 
        formularioP.nomPerfil.value = contenidoItem;
        formularioP.updatePerfil.dataset.id = idLapiz;
        console.log(formularioP.updatePerfil.dataset.id);
        
    }


    if(elemento.target.classList.contains('btnsubmitDP')){
        const formularioDP = document.querySelector('.formDatosEdit');
        console.log('clica en actualizar');
        console.log(idLapiz);
        formularioDP.setAttribute('action', `cv.php?dpe=${idLapiz}`);
        formularioDP.submit();
    }
    if(elemento.target.classList.contains('btnsubmitC')){
        const formularioC = document.querySelector('.formCompetenciasEdit');
        console.log('clica en actualizar');
        console.log(idLapiz);
        formularioC.setAttribute('action', `cv.php?compE=${idLapiz}`);
        formularioC.submit();
    }
    if(elemento.target.classList.contains('btnsubmitP')){
        const formularioP = document.querySelector('.formPerfilEdit');
        console.log('clica en actualizar');
        console.log(idLapiz);
        formularioP.setAttribute('action', `cv.php?perfE=${idLapiz}`);
        formularioP.submit();
    }

    
    

})



//Detecta click para añadir dato personal
document.querySelector('.addDatos').addEventListener('click',()=>{
    document.querySelector('.formDatos').style.display = 'block';
})


//Detecta click para añadir habilidad
document.querySelector('.addHability').addEventListener('click',()=>{
    document.querySelector('.formHabilidades').style.display = 'block';
})
//Detecta click para añadir idioma
document.querySelector('.addIdiom').addEventListener('click',()=>{
    document.querySelector('.formIdiomas').style.display = 'block';
})

//Detecta click para añadir hab informatica
document.querySelector('.addInformatica').addEventListener('click',()=>{
    document.querySelector('.formInformatica').style.display = 'block';
})
//Detecta click para añadir competencia
document.querySelector('.addCompetencia').addEventListener('click',()=>{
    document.querySelector('.formCompetencias').style.display = 'block';
})
//Detecta click para añadir perfil
document.querySelector('.addPerfil').addEventListener('click',()=>{
    document.querySelector('.formPerfil').style.display = 'block';
})

// //Detecta click para eliminar y hace pregunta de confirmación
// document.querySelector('.fa-trash').addEventListener('click',()=>{
//     alert('Elemento borrado');
// })

//Detecta click para añadir seccion
document.querySelector('.addSection').addEventListener('click',()=>{
    alert("En procés...")
})
