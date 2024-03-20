const auth_token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJlc2FjZXZlZG84NkBnbWFpbC5jb20iLCJhcGlfdG9rZW4iOiJINTZHTVdiNHpiMmhOTW9DanJ0SkY1MUswLW1KeEd3ZFNpV25SM0diNUhWbVdnMU9ReFpaSnFLVUpOX2VyQ3dZVjVjIn0sImV4cCI6MTcxMDk5MjA4MH0.f3knZzBKf-46NuXpiEKCab2eaxfPPxFQy7gSSt8Pe7s"

axios.get('https://www.universal-tutorial.com/api/countries/', {
    headers: {
        'Authorization': `Bearer ${auth_token}`,
        'Accept': 'application/json'
    }
})
    .then(response => {
        const countries = response.data;
        const countrySelect = document.getElementById('pais');

        countries.forEach(country => {
            const option = document.createElement('option');
            option.value = country.country_name;
            option.textContent = country.country_name;
            countrySelect.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Error al obtener países:', error);
    });

// Función para cargar los estados basados en el país seleccionado
function cargarEstados(paisSeleccionado) {
    axios.get(`https://www.universal-tutorial.com/api/states/${paisSeleccionado}`, {
        headers: {
            'Authorization': `Bearer ${auth_token}`,
            'Accept': 'application/json'
        }
    })
        .then(response => {
            const estados = response.data;
            const estadoSelect = document.getElementById('estado');
            estadoSelect.innerHTML = ''; // Limpiar opciones anteriores

            estados.forEach(estado => {
                const option = document.createElement('option');
                option.value = estado.state_name;
                option.textContent = estado.state_name;
                estadoSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error al cargar estados:', error);
        });
}

// Cargar estados cuando se seleccione un país
document.getElementById('pais').addEventListener('change', function () {
    const paisSeleccionado = this.value;
    if (paisSeleccionado !== '') {
        cargarEstados(paisSeleccionado);
    } else {
        // Si no se selecciona ningún país, limpiar opciones de estados
        const estadoSelect = document.getElementById('estado');
        estadoSelect.innerHTML = '<option value="">Selecciona un estado</option>';
    }
});



// Función para cargar las ciudades basadas en el estado seleccionado
function cargarCiudades(estadoSeleccionado) {
    axios.get(`https://www.universal-tutorial.com/api/cities/${estadoSeleccionado}`, {
        headers: {
            'Authorization': `Bearer ${auth_token}`,
            'Accept': 'application/json'
        }
    })
        .then(response => {
            const ciudades = response.data;
            const ciudadSelect = document.getElementById('ciudad');
            ciudadSelect.innerHTML = ''; // Limpiar opciones anteriores

            ciudades.forEach(ciudad => {
                const option = document.createElement('option');
                option.value = ciudad.city_name;
                option.textContent = ciudad.city_name;
                ciudadSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error al cargar ciudades:', error);
        });
}

// Cargar ciudades cuando se seleccione un estado
document.getElementById('estado').addEventListener('change', function () {
    const estadoSeleccionado = this.value;
    if (estadoSeleccionado !== '') {
        cargarCiudades(estadoSeleccionado);
    } else {
        // Si no se selecciona ningún estado, limpiar opciones de ciudades
        const ciudadSelect = document.getElementById('ciudad');
        ciudadSelect.innerHTML = '<option value="">Selecciona una ciudad</option>';
    }
});
