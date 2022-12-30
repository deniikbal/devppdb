@php
    require asset()
    $this->fpdf->SetFont('Arial', 'B', 15);
    $this->fpdf->AddPage("L", ['100', '100']);
    $this->fpdf->Text(10, 10, "Hello World!");

    $this->fpdf->Output();

    exit;
@endphp
