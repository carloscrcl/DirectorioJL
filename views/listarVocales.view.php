<?php
include '../views/fijos/head.php';
?>

<div class="contenedor">
    <main>
        <div class="cuerpo-principal">

            <?php foreach ($datosJl as $miembro) {
         if ((int) ($miembro['distrito_id']) === 21) { ?>
            <div class="encabezado">
                <article id="" class="card thCard-jl">
                    <p>
                        <?php echo $miembro['cargo']; ?>
                    </p>
                </article>
            </div>
            <article id="<?php echo $miembro['id']; ?>" class="card">

                <img class="cover" src="<?php echo '../img/' . $miembro['foto']; ?>"
                    alt="<?php echo $miembro['cargo']; ?>" title="">

                <div class="details">

                    <div class="description">
                        <p>
                            <?php echo $miembro['nombre']; ?>
                        </p>
                        <p>
                            <?php echo $miembro['paterno']; ?>
                        </p>
                        <p>
                            <?php echo $miembro['materno']; ?>
                        </p>
                        <p><span class="embellecer">
                                <?php echo $miembro['email']; ?>
                            </span></p>

                    </div>
                </div>
            </article>
            <?php
         }
       }
       ?>
        </div>

        <div class="encabezado">

            <article id="" class="card thCard">
                <h3>Distrito</h3>
            </article>
            <article id="" class="card thCard">
                <h3>Vocal Ejecutivo</h3>
            </article>
            <article id="" class="card thCard">
                <h3>Vocal Secretario</h3>
            </article>
            <article id="" class="card thCard">
                <h3>Vocal de Capacitación</h3>
            </article>
            <article id="" class="card thCard">
                <h3>Vocal de Organización</h3>
            </article>
            <article id="" class="card thCard">
                <h3>Vocal del Registro</h3>
            </article>
            <article id="" class="card thCard">
                <h3>JOSA</h3>
            </article>
            <article id="" class="card thCard">
                <h3>Dirección</h3>
            </article>
            <article id="" class="card thCard">
                <h3>telefonos</h3>
            </article>
        </div>
        <!--FIN ENCABEZADO-->

        <div class="cuerpo">

            <?php for( $i = 0; $i < count($direcciones); $i++ ):
             
          if ((int) ($direcciones[$i]['id']) > 0 && (int) ($direcciones[$i]['id']) < 21): 
            $junta = ($i < 9) ? '0'.($i+1): ($i+1); 
          
          ?>
            <article id="<?php echo 'cab_'. $direcciones[$i]["id"]; ?>" class="body_card cabecera">
                <h3 class="cabecera_distrito">
                    <?php echo $junta." " .$direcciones[$i]['cabecera'] ;?>
                </h3>
                <!--FIN BODY CARD RIGHT-->

            </article>
            <?php 
            
            for($j=0;$j < 6; $j++): ?>
            <article id="<?php echo $vocales[$j]['id']; ?>" class="body_card">
                <div class="body_card-left">
                    <img class="body_card-img" src="<?php echo '../img/' . $vocales[$j]['foto']; ?>"
                        alt="<? echo $vocales[$j]['cargo_id']; ?>" title="" />
                </div>

                <div class="body_card_right">

                    <div class="body_card-right-details">
                        <p>
                            <?php echo $vocales[$j]['nombre']; ?>
                        </p>
                        <p>
                            <?php echo $vocales[$j]['paterno']; ?>
                        </p>
                        <p>
                            <?php echo $vocales[$j]['materno']; ?>
                        </p>
                        <p><span class="embellecer">
                                <?php echo $vocales[$j]['email']; ?>
                            </span>
                        </p>

                    </div>
                    <!--FIN DETAILS-->
                </div>
                <!--FIN BODY CARD RIGHT-->

            </article>
            <?php    
            endfor;
          
          ?>

            <article id="<?php echo 'dir_'.$direcciones[$i]['id'] ; ?>" class="body_card direccion">
                <p>
                    <?php echo $direcciones[$i]['prefijo']." ". $direcciones[$i]['calle'] ; ?>
                </p>
                <p>
                    <?php echo " No. ".$direcciones[$i]['No'].";" ; ?>
                </p>
                <p>
                    <?php 
                    if( $direcciones[$i]['referencia'] !== null ){
                      echo $direcciones[$i]['referencia'].";" ; 
                    }else{
                      continue;
                    }
                    // ?>
                </p>

                <p>
                    <?php echo $direcciones[$i]['col'].";"; ?>
                </p>
                <p>
                    <?php echo "Cp. ". $direcciones[$i]['cp'].";"; ?>
                </p>
                <p>
                    <?php echo $direcciones[$i]['cabecera']." Ver"; ?>
                </p>

            </article>

            <article id="<?php echo 'tel_'. $direcciones[$i]['id']; ?>" class="body_card telefonos">
                <?php foreach($direcciones[$i]['tels'] as $tel):
                if($tel != null || $tel !=""){?>
                <p>
                    <?php 
                    if(($i) == 7 && $tel == '9628646'){
                      echo "(296)-". $tel; 

                    }else{
                      echo "(".$direcciones[$i]['lada'].")-". $tel; 
                    }
                    ?>
                </p>
                <?php
                }else{
                  continue;
                }
              endforeach;
              ?>
            </article>
            <?php  
          endif;
        endfor;
      ?>

        </div>
        <!--FIN CUERPO -->
    </main><!-- FIN MAIN -->
</div>
<!--FIN COPNTENEDOR-->
<?php
include("../views/fijos/footer.php");
?>