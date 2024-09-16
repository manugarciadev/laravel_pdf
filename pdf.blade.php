<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Template</title>
    <style>
        /* Estilos para a logo na capa */
        .logo-container {
            text-align: center;
            margin-top: 20px;
            width: 100%; /* Adicionando largura 100% para centralizar */
        }

        .logo-agencia {
            max-width: 200px;
            margin: 0 auto; /* Adicionando margem automática para centralizar */
            display: block; /* Garante que a margem automática funcione corretamente */
        }

        /* Estilos para a visualização das informações */
        .info-box {
            background-color: #f0f0f0;
            padding: 8px;
            margin-bottom: 8px;
            border-radius: 20px;
            width:250px;
            height: 100px;
            margin-right: 20px; /* Adiciona espaço entre os elementos */
            display: inline-block; /* Exibir os elementos em linha */
            margin-right: auto;
            margin-left: auto; /* Define as margens laterais como automáticas para centralizar */
        }

        .info-box-container {
            text-align: center; /* Centralizar os elementos */
        }


        .viajante-box {
            background-color: #f0f0f0;
            padding: 8px;
            margin-bottom: 32px;
            border-radius: 20px;
            width:400px;
            height: 100px;
            margin-right: 20px; /* Adiciona espaço entre os elementos */
            margin-right: auto;
            display: inline-block; /* Exibir os elementos em linha */
            margin-left: auto; /* Define as margens laterais como automáticas para centralizar */
            text-align: center; /* Centraliza o texto */

        }
        .info-box p {
            margin: 3px 0;
                }

        body {

            background-image: url("{{ public_path('images/logos/fundo1.png') }}");
            background-size: cover;
        }

                    /* Estilos para o rodapé */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }

        .icone {
            width: 20px; /* Ajuste o tamanho conforme necessário */
            height: 20px; /* Ajuste o tamanho conforme necessário */
            vertical-align: middle; /* Alinhar verticalmente com o texto */
        }

        .info-label {
            display: inline-block;
            width: 250px; /* Ou qualquer largura desejada */
            vertical-align: top;
            }

        .info-data {
            display: inline-block;
            vertical-align: top;
        }

        .info-separator {
            margin: 0 5px; /* Ajuste a margem conforme necessário */
        }

 /* Estilos para a logo na capa */
        .qr-container {
            text-align: right;
            margin-top: 20px;
            width: 100%; /* Adicionando largura 100% para centralizar */
        }

          .qr-code {
            max-width: 150px;
            margin: 0 auto; /* Adicionando margem automática para centralizar */
            display: block; /* Garante que a margem automática funcione corretamente */
        }
       .container {
            position: relative;
            width: 100%;
            max-width: 1024px;
        .image {
            display: block;
            width: 100%;
            height: auto;
        }
        .text {
            position: absolute;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }
        .title {
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px;
        }
        .from {
            top: 93px;
            left: 13%;
            font-size: 10px;
        }
        .to {
            top: 93px;
            right: 10%;
            font-size: 10px;
        }
        .duration {
            top: 90px;
            left: 45%;
        }
        .time {
            top: 70%;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>
    <!-- Página 1: Capa -->
  <div>
        <!-- Container para a capa do PDF -->
        @if(!empty($data['supplier']))
         <div class="logo-container">
            <!-- Logo da Agência -->
            <img src="{{ $data['supplier']['image'][0] }}" alt="Logo da Agência" class="logo-agencia">
        </div>
        @else
        <div class="logo-container">
            <!-- Logo da Agência -->
            <img src="{{ public_path('images/logos/logo.png') }}" alt="Logo da Agência" class="logo-agencia">
        </div>
        @endif


       <!-- Nova imagem -->
        <div style="text-align: center; margin-top: 150px;">
          <img src="{{ public_path('images/logos/capa.png') }}" alt="Capa" style="display: block; max-width: 100%;">
        </div>


        <!-- Rodapé da capa -->
        @if(!empty($data['supplier']))
         <footer>
            <p>{{ $data['supplier']['website']}}</p>
        </footer>
        @else
        <footer>
            <p>www.bucountrytours.com</p>
        </footer>
        @endif
 </div>

<div style="page-break-before: always;">
    <!-- Adicione informações gerais aqui -->
    <div class="content-wrapper">
        <!-- Espaço maior após a segunda imagem -->
        <div style="margin-top: 40px;"></div>
        <div class="info-box-container" style="display: flex; justify-content: space-between; width: 100%;">
            <div class="info-box" style="width: 68%;">
                <p style="margin-bottom: 10px;"><b>  @if($data['language'] == 'Portuguese')
                NOME DO VIAJANTE PRINCIPAL:
                @elseif($data['language'] == 'English')
                    MAIN TRAVELER'S NAME:
                @elseif($data['language'] == 'Spanish')
                    NOMBRE DEL VIAJERO PRINCIPAL:
                @elseif($data['language'] == 'French')
                    NOM DU VOYAGEUR PRINCIPAL:
                @elseif($data['language'] == 'German')
                    HAUPTREISENDER NAME:
                @endif</b>
               </p>
              <p>{{ $data['participants'][0]['name'] }}</p>
            </div>
            <div class="info-box" style="width: 25%;">
                <p style="margin-bottom: 10px;"><b> @if($data['language'] == 'Portuguese')
                Nº DE VIAJANTES:
            @elseif($data['language'] == 'English')
                NUMBER OF TRAVELERS:
                @elseif($data['language'] == 'Spanish')
                NÚMERO DE VIAJEROS:
            @elseif($data['language'] == 'French')
                NOMBRE DE VOYAGEURS:
            @elseif($data['language'] == 'German')
                ANZAHL DER REISENDEN:
            @endif</b></p>
                <p>{{ count($data['participants']) }}</p>
            </div>
        </div>
        <div class="info-box-container" style="display: flex; justify-content: space-between; width: 100%;">
            <div class="info-box" style="width: 32.5%;">
                <p style="margin-bottom: 10px;"><b> @if($data['language'] == 'Portuguese')
                DATA DE INÍCIO:
            @elseif($data['language'] == 'English')
                START DATE:
            @elseif($data['language'] == 'Spanish')
                FECHA DE INICIO:
            @elseif($data['language'] == 'French')
                DATE DE DÉBUT:
            @elseif($data['language'] == 'German')
                STARTDATUM:
            @endif</b></p>
                <p style="margin-bottom: 5px;">{{ $data['startDate'] }}</p>
                <p> @if($data['language'] == 'Portuguese')
                INÍCIO EM:
            @elseif($data['language'] == 'English')
                STARTS AT:
            @elseif($data['language'] == 'Spanish')
                COMIENZA EN:
            @elseif($data['language'] == 'French')
                COMMENCE À:
            @elseif($data['language'] == 'German')
                BEGINNT AM:
           
            </div>
            <div class="info-box" style="width: 32.5%;">
                <p style="margin-bottom: 10px;"><b> @if($data['language'] == 'Portuguese')
                DATA DE TÉRMINO:
            @elseif($data['language'] == 'English')
                END DATE:
            @elseif($data['language'] == 'Spanish')
                FECHA DE FINALIZACIÓN:
            @elseif($data['language'] == 'French')
                DATE DE FIN:
            @elseif($data['language'] == 'German')
                ENDDATUM:
            @endif</b></p>
                <p style="margin-bottom: 5px;">{{ $data['endDate'] }}</p>
                <p> @if($data['language'] == 'Portuguese')
                TÉRMINO EM:
            @elseif($data['language'] == 'English')
                ENDS AT:
            @elseif($data['language'] == 'Spanish')
                TERMINA EN:
            @elseif($data['language'] == 'French')
                SE TERMINE À:
            @elseif($data['language'] == 'German')
                ENDET AM:
            
            </div>
            <div class="info-box" style="width: 25%;">
                <p style="margin-bottom: 10px;"><b>  @if($data['language'] == 'Portuguese')
                DURAÇÃO TOTAL:
            @elseif($data['language'] == 'English')
                TOTAL DURATION:
            @elseif($data['language'] == 'Spanish')
                DURACIÓN TOTAL:
            @elseif($data['language'] == 'French')
                DURÉE TOTALE:
            @elseif($data['language'] == 'German')
                GESAMTDUER:
            @endif</b></p>
                <p>{{ count($data['columns']) }}  @if($data['language'] == 'Portuguese')
                    DIAS
                @elseif($data['language'] == 'English')
                    DAYS
                @elseif($data['language'] == 'Spanish')
                    DÍAS
                @elseif($data['language'] == 'French')
                    JOURS
                @elseif($data['language'] == 'German')
                    TAGE
                @endif</p>
            </div>

              <!-- Adicione o itinerário aqui -->
        <h2 style="text-align: center; color: green;">@if($data['language'] == 'Portuguese')
            ITINERÁRIO DE VIAGEM
        @elseif($data['language'] == 'English')
                                                                                                                                                                                                                                                                                                                                                                       TRAVEL ITINERARY
        @elseif($data['language'] == 'Spanish')
            ITINERARIO DE VIAJE
        @elseif($data['language'] == 'French')
            ITINÉRAIRE DE VOYAGE
        @elseif($data['language'] == 'German')
            REISEITINERAR
        @endif
        </h2>
            <table border="0" style="width: 100%; width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: green; height: 30px;">
                    <th style="width: 60px;  height: 30px; color: white; font-size: 20px; text-align: center;"> @if($data['language'] == 'Portuguese')
                            DIAS
                        @elseif($data['language'] == 'English')
                            DAYS
                        @elseif($data['language'] == 'Spanish')
                            DÍAS
                        @elseif($data['language'] == 'French')
                            JOURS
                        @elseif($data['language'] == 'German')
                            TAGE
                        @endif</th>
                            <th style="width: 80px;  color: white; font-size: 20px; text-align: center;">  @if($data['language'] == 'Portuguese')
                            DATA
                        @elseif($data['language'] == 'English')
                            DATE
                        @elseif($data['language'] == 'Spanish')
                            FECHA
                        @elseif($data['language'] == 'French')
                            DATE
                        @elseif($data['language'] == 'German')
                            DATUM
                        @endif</th>
                            <th style="width: 128px; color: white; font-size: 20px; text-align: center;">  @if($data['language'] == 'Portuguese')
                            HORA DE INÍCIO
                        @elseif($data['language'] == 'English')
                            START TIME
                        @elseif($data['language'] == 'Spanish')
                            HORA DE INICIO
                        @elseif($data['language'] == 'French')
                            HEURE DE DÉBUT
                        @elseif($data['language'] == 'German')
                            STARTZEIT
                        @endif</th>
                            <th style="width: auto;  color: white; font-size: 20px; text-align: left; padding-left: 10px;">@if($data['language'] == 'Portuguese')
                            DESCRIÇÃO
                        @elseif($data['language'] == 'English')
                            DESCRIPTION
                        @elseif($data['language'] == 'Spanish')
                            DESCRIPCIÓN
                        @elseif($data['language'] == 'French')
                            DESCRIPTION
                        @elseif($data['language'] == 'German')
                            BESCHREIBUNG
                        @endif</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $previousDay = null;
                @endphp
                @foreach($data['columns'] as $zone)
                    @foreach($zone['items'] as $card)
                        @php
                            $currentDay = $zone['name'];
                        @endphp
                        @if($currentDay !== $previousDay)
                            <tr>
                                <td rowspan="{{ count($zone['items']) }}" style="<?php echo strpos($zone['name'], 'Day') === 0 ? 'background-color: #f0f0f0;' : ''; ?> text-align: center;">{{ $currentDay }}</td>
                                <td>{{ $zone['name'] }}</td>
                                
                                <td style="padding-left: 10px;">
                                @foreach($card['languagesTour'] as $language)
                                        @if($language['name'] === $data['language'])
                                            {{$language['title']}}
                                        @endif
                                @endforeach
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>{{ $zone['name'] }}</td>
                                
                                <td style="padding-left: 10px;">
                                @foreach($card['languagesTour'] as $language)
                                        @if($language['name'] === $data['language'])
                                            {{$language['title']}}
                                        @endif
                                @endforeach
                                </td>
                            </tr>
                        @endif
                        @php
                            $previousDay = $currentDay;
                        @endphp
                    @endforeach
                @endforeach
            </tbody>
        </table>
            <!-- Restante do itinerário -->

    </div>
</div>

<!-- Div que cria as páginas -->
@foreach($data['columns'] as $dropZone)
    @php
        $cards = collect($dropZone['items']);
    @endphp
    @foreach($cards as $index => $card)
        @php
            $nextCard = $cards->get($index + 1);
        @endphp
        @if ($card['type'] === 'day-tour-activity')
        <div style="page-break-before: always;">
            <div class="content-wrapper">
                <div>
                    <table>
                        <tr>
                            <td><h1 style="color: green;">{{ $dropZone['title'] }} | </h1></td>
                            <td>
                                @foreach($card['languagesTour'] as $language)
                                        @if($language['name'] === $data['language'])
                                           <h2> {{$language['title']}} </h2>
                                        @endif
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Restante das inclusões e exclusões -->
                <div style="margin-top: 50px;"></div>
                     <div style="display: flex; justify-content: space-between;">
                        @php
                            $images = $card['images']; // Todas as imagens disponíveis
                        @endphp
                        @foreach($images as $image)
                            <img src="{{ $image }}" alt="Imagem" style="width: 32.7%; height: auto;">
                        @endforeach
                    </div>
                <!-- Adicionar descrição longa -->
                @foreach($card['languages'] as $language)
                    @if($language['name'] === $data['language'])
                        <p> {{$language['longDescription']}} </p>
                    @endif
                 @endforeach
              <!-- Renderizar inclusões -->
                <div>
                    <img src="{{ public_path('images/logos/v.png') }}" alt="Visto" class="icone" style="vertical-align: middle;">
                    <p style="display: inline-block; vertical-align: middle;"> @if($data['language'] == 'Portuguese')
                            Inclusões |
                        @elseif($data['language'] == 'English')
                            Inclusions |
                        @elseif($data['language'] == 'Spanish')
                            Inclusiones |
                        @elseif($data['language'] == 'French')
                            Inclusions |
                        @elseif($data['language'] == 'German')
                            Inklusivleistungen |
                        @endif
                        @foreach($card['inclusions'] as $index => $inclusion)
                              {{ $inclusion['title'] }}
                              @if($index < count($card['inclusions']) - 1)
                                |
                            @endif
                        @endforeach
                    </p>
                </div>
                <!-- Renderizar exclusões -->
                <div>
                    <img src="{{ public_path('images/logos/x.png') }}" alt="X" class="icone" style="vertical-align: middle;">
                    <p style="display: inline-block; vertical-align: middle;"> @if($data['language'] == 'Portuguese')
                            Exclusões |
                        @elseif($data['language'] == 'English')
                            Exclusions |
                        @elseif($data['language'] == 'Spanish')
                            Exclusiones |
                        @elseif($data['language'] == 'French')
                            Exclusions |
                        @elseif($data['language'] == 'German')
                            Ausschlüsse |
                        @endif
                        @foreach($card['exclusions'] as $index => $exclusion)
                            {{ $exclusion['title'] }}
                            @if($index < count($card['exclusions']) - 1)
                                |
                            @endif
                        @endforeach
                 </p>
            </div>
            @if ($card['type'] === 'transfer')
            <div class="container">
              <img src="{{ public_path('images/logos/transfer_car.png') }}" alt="Flight Image" class="image">
              <div class="text title">Titulo do Transfer</div>
              <div class="text from">
                @if($data['language'] == 'Portuguese')
                    De
                @elseif($data['language'] == 'English')
                    From
                @elseif($data['language'] == 'Spanish')
                    Desde
                @elseif($data['language'] == 'French')
                    De
                @elseif($data['language'] == 'German')
                    Von
                @endif
                 <br>Praia</div>
              <div class="text to">
                @if($data['language'] == 'Portuguese')
                    Para
                @elseif($data['language'] == 'English')
                    To
                @elseif($data['language'] == 'Spanish')
                    Hasta
                @elseif($data['language'] == 'French')
                    A
                @elseif($data['language'] == 'German')
                    Nach
                @endif
                 <br>Sao Filipe</div>
                 <div class="text duration">45 min</div>
              <div class="text time">x</div>
           </div>
         @endif

         @if($nextCard)
         @if ($nextCard['type'] === 'transfer')
            <div class="container">
              <img src="{{ public_path('images/logos/transfer_car.png') }}" alt="Flight Image" class="image">
              <div class="text title">{{ $nextCard['name'] }}</div>
              <div class="text from">
                @if($data['language'] == 'Portuguese')
                    De
                @elseif($data['language'] == 'English')
                    From
                @elseif($data['language'] == 'Spanish')
                    Desde
                @elseif($data['language'] == 'French')
                    De
                @elseif($data['language'] == 'German')
                    Von
                @endif
                
              <div class="text to">
                @if($data['language'] == 'Portuguese')
                    Para
                @elseif($data['language'] == 'English')
                    To
                @elseif($data['language'] == 'Spanish')
                    Hasta
                @elseif($data['language'] == 'French')
                    A
                @elseif($data['language'] == 'German')
                    Nach
                @endif
                 </div>
              <div class="text duration">45 min</div>
              <div class="text time">x</div>
           </div>
         @endif
    @endif


</body>

 