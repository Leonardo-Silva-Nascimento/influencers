<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel + jQuery</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/jquery.js') }}"></script>
    @vite(['resources/js/app.js'])
    @vite(['resources/js/home.js'])
    @vite(['resources/css/home.css'])
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="influencers-tab" data-bs-toggle="tab" href="#influencers" role="tab"
                    aria-controls="influencers" aria-selected="true">Influenciadores</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="campaigns-tab" data-bs-toggle="tab" href="#campaigns" role="tab"
                    aria-controls="campaigns" aria-selected="false">Campanhas</a>
            </li>
        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="influencers" role="tabpanel" aria-labelledby="influencers-tab">
                <button class="btn btn-primary btn-lg rounded-3 shadow-sm" type="button" data-bs-toggle="modal"
                    data-bs-target="#criarInfluenciadorModal">Criar influenciador</button>
                <table id="influencerTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Instagram</th>
                            <th>Seguidores</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($influencer as $influ)
                            <tr>
                                <td>{{ $influ->id }}</td>
                                <td>{{ $influ->name }}</td>
                                <td>{{ $influ->insta_user }}</td>
                                <td>{{ number_format($influ->follows, 0, ',', '.') }}</td>
                                <td>{{ $influ->category }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="campaigns" role="tabpanel" aria-labelledby="campaigns-tab">
                <button class="btn btn-primary btn-lg rounded-3 shadow-sm" type="button" data-bs-toggle="modal"
                    data-bs-target="#criarCampanhaModal">Criar campanha</button>
                <table id="campaignTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome da Campanha</th>
                            <th>Orçamento</th>
                            <th>Data de Início</th>
                            <th>Data de Fim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campanha as $camp)
                            <tr>
                                <td>{{ $camp->id }}</td>
                                <td>{{ $camp->name }}</td>
                                <td>R$ {{ number_format($camp->budget, 2, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($camp->start_date)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($camp->end_date)->format('d/m/Y') }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="criarInfluenciadorModal" tabindex="-1" aria-labelledby="criarInfluenciadorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="criarInfluenciadorModalLabel">Criar Influenciador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="/createInfluencer">
                        @csrf
                        <div class="mb-3">
                            <label for="nomeInfluenciador" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nomeInfluenciador" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailInfluenciador" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailInfluenciador" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="instagramInfluenciador" class="form-label">Instagram</label>
                            <input type="text" class="form-control" id="instagramInfluenciador" name="insta_user"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="seguidoresInfluenciador" class="form-label">Seguidores</label>
                            <input type="number" class="form-control" id="seguidoresInfluenciador" name="follows"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="categoriaInfluenciador" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="categoriaInfluenciador" name="category"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="criarCampanhaModal" tabindex="-1" aria-labelledby="criarCampanhaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="criarCampanhaModalLabel">Criar Campanha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="/createCampaign">
                        @csrf

                        <div class="mb-3">
                            <label for="nomeCampanha" class="form-label">Nome da Campanha</label>
                            <input type="text" class="form-control" id="nomeCampanha" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="orçamentoCampanha" class="form-label">Orçamento</label>
                            <input type="number" class="form-control" id="orçamentoCampanha" name="budget"
                                step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="influenciadores" class="form-label">Influenciadores</label>
                            <select name="influencers[]" id="influenciadores" class="form-control"
                                multiple="multiple" style="width: 100%">
                                @foreach ($influencer as $influ)
                                    <option value="{{ $influ->id }}" data-name="{{ $influ->name }}">
                                        {{ $influ->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição</label>
                            <input name="description" type="textarea" class="form-control" id="nomeCampanha" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="dataInicioCampanha" class="form-label">Data de Início</label>
                            <input type="date" class="form-control" id="dataInicioCampanha" name="start_date"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="dataFimCampanha" class="form-label">Data de Fim</label>
                            <input type="date" class="form-control" id="dataFimCampanha" name="end_date"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
