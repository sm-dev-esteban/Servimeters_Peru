<div id="test-l-1" class="content">
   <p class="">En el siguiente formulario se recolectara la siguiente información para comenzar el proceso de Homologación de proveedores:</p>
   <ol>
      <li>Situación financiera y requisitos legales</li>
      <li>Capacidad Operativa</li>
      <li>Gestión de Calidad</li>
      <li>Responsabilidad corporativa (Recursos Humanos, seguridad, salud y medio ambiente)</li>
   </ol>
   <p>La ponderación de evaluación de fue previamente especificada por la empresa. El presente formulario cuenta con un alcance definido,
      el cual no puede extenderse a otras actividades ya definidas. La responsabilidad de SERVIMETERS PERU S.A.C. se extiende a garantizar
      únicamente que el proveedor ha sido evaluado y calificado de acuerdo con un procedimiento por lo cual no asume responsabilidad alguna
      si el proveedor falla en algún producto o servicio que será objeto de homologación.</p>
   <p>Llenando de este formulario <strong>AUTORIZO</strong> de forma expresa a SERVIMETERS PERÚ S.A.C. o a quien represente sus derechos o autorice en el
      futuro a consultar toda información referente al comportamiento comercial para certificarme como proveedor homologado en las centrales
      de riesgo. Lo anterior implica que todo cumplimiento o incumplimiento de las obligaciones financieras son reflejadas en bases de datos.</p>
   <p>Excepto que la ley y las autoridades lo requieran, SERVIMETERS.</p>
   <p>PERÚ S.A.C., tratara de manera
      confidencial y no revelara a terceros, sin previo consentimiento por escrito del cliente, la información que el cliente suministre en este
      formulario y durante la ejecución del servicio de Homologación de Proveedores. Aquella información que se obtenga sobre el cliente de fuentes
      distintas (por ejemplo, una persona que realiza una queja, de autoridades reglamentarias) también se tratará de manera confidencial.
      Y los datos aportados por la empresa son tratados de acuerdo a la Ley Orgánica 15/1999 de Protección de Datos de Carácter Personal y
      normativa de desarrollo, respetando los derechos de accesos, rectificación y cancelación. Estos datos se emplearán exclusivamente por
      SERVIMETERS PERÚ S.A.C. y departamentos adjuntos.</p>
   <!--Validación de si acepta las condiciones-->
   <form id="condicionesForm">
      <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
      <label>
         <input type="checkbox" name="data[terminos]" id="conditionBox" required>
         Acepto las condiciones
      </label>
      <br>
   </form>
   <button class="btn btn-primary" onclick="stepper.next()" id="next">Siguiente</button>
</div>