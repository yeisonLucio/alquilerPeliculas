{% block body %}
    <h1>Peliculas list</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>fechaLanzamiento</th>
                <th>Duracion</th>
                <th>sinopsis</th>
                <th>Estreno</th>
                <th>Calidad</th>
                <th>Genero</th>
                <th>Usuarioid</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        {% for pelicula in peliculas %}
            <tr>
                <td><a href="{{ path('pelicula_show', { 'id': pelicula.id }) }}">{{ pelicula.id }}</a></td>
                <td>{{ pelicula.nombre }}</td>
                <td>{{pelicula.fechaLanzamiento|date("d/m/Y")}}</td>
                <td>{{ pelicula.duracion }}</td>
                <td>{{ pelicula.sinopsis }}</td>
                <td>{{ pelicula.estreno }}</td>
                <td>{{ pelicula.calidad }}</td>
                <td>{{ pelicula.genero }}</td>
                <td>{{ pelicula.usuarioId }}</td>
                <td>
                    <ul>
                        <li>
                            <a href="{{ path('pelicula_show', { 'id': pelicula.id }) }}">show</a>
                        </li>
                        <li>
                            <a href="{{ path('pelicula_edit', { 'id': pelicula.id }) }}">edit</a>
                        </li>
                    </ul>
                </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <ul>
        <li>
            <a href="{{ path('pelicula_new') }}">Create a new pelicula</a>
        </li>
    </ul>
    {% for msg in app.flashes('success') %}
    <div class="alert alert-success">
        {{ msg }}
    </div>
    {% endfor %}
{% endblock %}
