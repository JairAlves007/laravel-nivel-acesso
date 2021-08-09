<div class="container-fluid">
    @switch($nivel)
      @case("Gestor")

         <div class="col md-3">
            <table class="table table-striped table-hover center" style="text-align: center;">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Nome</th>
                     <th scope="col">Nível</th>
                     <th scope="col">Ações</th>
                  </tr>
               </thead>

               {{-- {{ dd($users) }} --}}

               <tbody>
                  @foreach($users as $user)
                     <tr>
                        <td>
                           {{ $user->id }}
                        </td>

                        <td>
                           {{ $user->name }}
                        </td>

                        <td>
                           {{ $user->nivel }}
                        </td>

                        <td>
                           <a 
                              href="/user/authorize/{{ $user->id }}" 
                              class="btn btn-primary"
                           >Autorizar Usuário</a>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>

      @break

      @case("Bolsista")

         <li>
               Se Cadastrar
         </li>

         <li>
               Se Candidatar A Projetos
         </li>

         <li>
               Visualizar Editais
         </li>

      @break

      @case("Orientador")

         <li>
               Submeter Propostas
         </li>

         <li>
               Indicar Bolsista
         </li>

         <li>
               Homologar Frequência
         </li>

      @break

      @case("Membro")

         <li>
               Avaliar Projeto
         </li>

         <li>
               Avaliar Relatório Parcial/Final Do Projeto
         </li>

      @break

      @default
         <li>Você Não Está Logado</li>
    @endswitch
</div>
