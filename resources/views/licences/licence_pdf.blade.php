
@php
  // Include the Dompdf library
  require_once 'path/to/dompdf/autoload.inc.php';

  // Create an instance of the Dompdf class
  $dompdf = new Dompdf\Dompdf();

  // Render the HTML content
  $dompdf->loadHtml(view('licences.licence_pdf')->render());

  // Set the paper size and orientation
  $dompdf->setPaper('A4', 'portrait');

  // Render the PDF
  $dompdf->render();

  // Output the generated PDF to the browser
  $dompdf->stream('licence.pdf');
@endphp