var data   = document.getElementById('data'),
    inicio = document.getElementById('inicio'),
    fim    = document.getElementById('fim');

/* Verifica se o Horário final é maior que o início */
fim.addEventListener('change', (event) => {
    if(inicio.value >= fim.value){
        fim.value = '';
        alert("O horário final da reserva deve ser maior que o início")
    }
});

/* Verifica se o Horário inicial é menor que o final */
inicio.addEventListener('change', (event) => {
    if(inicio.value >= fim.value && fim.value != ''){
        inicio.value = '';
        alert("O horário inicial da reserva deve ser menor que o final")
    }
});

/* Caso seja domingo, o restaurante abre as 11:00 */
data.addEventListener('change', (event) => {
    if((data.valueAsDate.getDay()) == 6){
        inicio.min = "11:00"
        fim.min    = "11:01"
    }
});