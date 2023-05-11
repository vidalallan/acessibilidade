<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Questões de Acessibilidade']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Questões de Acessibilidade']); ?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"> Problemas / Barreiras de Acessibilidade </h6>
              </div>
            </div>            

            <div class="card-body pt-4 pb-3">

              <div class="card-body pt-4 pb-3">
                <form action="/problemas-filtrar" method="get">
                  <label> Pesquisar por: </label>
                  <select class="form-select form-select-lg" name="searchBy">
                    <option value="0"> Escolha uma das opções </option>                  
                    <option value="1"> Título do problema </option>
                    <option value="2"> Dispositivo </option>
                    <option value="3"> Aplicativo </option>
                    <option value="4"> Guia de Acessibilidade </option>
                    <option value="5"> Problemas sem nenhuma avaliação </option>
                    <option value="6"> Problemas com pelo menos uma avaliação </option>
                  </select>

                  <div class="input-group input-group-outline my-3">                    
                    <input type="text" class="form-control" name="searchField"  placeholder="Digite aqui a sua consulta">
                  </div>

                  <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn bg-gradient-info"> Pesquisar </button>
                  </div>
                </form> 
              </div>

            <div class="row">

                  <?php if(session('mensagemExclusao')): ?>
                    <div class="alert alert-danger">
                        <p style="color:#fff;"><?php echo e(session('mensagemExclusao')); ?></p>
                    </div>
                  <?php endif; ?>

                <div class="col-sm">                  
                  
                  <h6 class="text-uppercase text-sm font-weight-bolder opacity-7">
                    <!--Total de problemas cadastrados: <?php echo e(App\Http\Controllers\IssueController::countIssueView()); ?> -->
                    Total de problemas: <?php echo e(count($issues)); ?>

                  </h6>               
                </div>

                <div class="col-sm">
                  <a href="/problemas-adicionar" class="btn btn btn-info " title="Adicionar problema" style="padding: 8px 17px;margin-top:-2px;">
                    <p class="text-xs font-weight mb-0">
                      <i class="material-icons opacity-10">add</i>  
                      Adicionar problema
                    </p>  
                  </a>             
                </div>
            </div>

            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
                  <thead>
                    <tr>                      
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Data </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Aplicativo </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Total de Avaliações </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Dispositivo </th>
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7">Título do Problema</th>                                           
                                            
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Guia de Acessibilidade </th>                  
                      <th class="text-uppercase text-sm font-weight-bolder opacity-7"> Ações </th>                                              
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                   
                    <tr>
                      <td> <div class="d-flex px-3 py-1"> <h6 class="mb-0 text-sm">  <?php echo e(date( 'd/m/Y',strtotime($issue->creationDate))); ?> </h6></div> </td>
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> <?php echo e($issue->appTitle); ?> </h6></div> </td>                      
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> <?php echo e($issue->totalAvaliacoes); ?> </h6></div> </td>
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> <?php echo e($issue->device); ?> </h6></div> </td>
                      <td> <div class="d-flex px-3 py-1"> <h6 class="mb-0 text-sm"> <?php echo e($issue->problem); ?> </h6></div> </td>                         
                      <td> <div class="d-flex px-3 py-1"><h6 class="mb-0 text-sm"> <?php echo e($issue->pattern); ?> </h6> </div></td>
                      
                      <td>

                        <a href="<?php echo e(url('/problema-detalhado')); ?>/<?php echo e($issue->id); ?>" title="Mais detalhes sobre o problema" class="btn btn-info" style="padding: 5px 10px;">
                          <p class="text-xs font-weight mb-0">
                            Detalhes
                          </p>                        
                        </a>                                                 

                        <a href="<?php echo e(url('/problema-detalhado')); ?>/<?php echo e($issue->id); ?>#evaluation" class="btn btn btn-warning btn-round" title="Avaliar o problema" style="padding: 3px 10px;">
                          <i class="material-icons opacity-10">note_add</i>                                                   
                        </a>

                        <?php if (\Illuminate\Support\Facades\Blade::check('AdminOnly')): ?>
                        <a href="/problemas/<?php echo e($issue->id); ?>" class="btn btn-success btn-round" title="Editar o problema" style="padding: 5px 10px;">
                          <p class="text-xs font-weight-bold mb-0">
                            <i class="material-icons opacity-10">edit</i>                            
                          </p>                        
                        </a>                        
                        <?php endif; ?>


                        <?php if (\Illuminate\Support\Facades\Blade::check('AdminOnly')): ?>
                        <a href="/problemas/<?php echo e($issue->id); ?>" class="btn btn-danger btn-round" title="Excluir o problema" style="padding: 5px 10px;"
                        data-toggle="modal" data-target="#exampleModal"
                        onclick="setaDadosModal(<?php echo e($issue->id); ?>,'<?php echo e($issue->problem); ?>')">
                          <p class="text-xs font-weight-bold mb-0">
                            <i class="material-icons opacity-10">close</i>                            
                          </p>                        
                        </a>
                        <?php endif; ?>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p id="textoExclusao"></p>
                              </div>
                              <div class="modal-footer">                                                                                      
                                <a href="" id="link-excluir" class="btn btn-danger"> Sim </a>
                                <a href="#" class="btn bg-gradient-info" data-dismiss="modal"> Não </a>                                
                              </div>
                            </div>
                          </div>
                        </div>

                        <script>
                          function setaDadosModal(idProblema,problema) {
                              texto = document.getElementById('textoExclusao');                              
                              texto.innerHTML = "Deseja realmente excluir o problema "+ problema + "?";

                              a = document.querySelector("#link-excluir");
                              a.href = "/problemas/"+idProblema;
                          }
                        </script>

                      </td>                      
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
        
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH /home1/allanv60/accessibility-api-main/resources/views/panel/problemas-pesquisar.blade.php ENDPATH**/ ?>