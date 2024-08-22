<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Exams;
use Illuminate\Support\Facades\Storage;
use PDF;

class pdfController extends Controller
{
    public function generatePDF(Request $request)
    {
        $color = $request->input('color');
        $aspecto = $request->input('aspecto');
        $densidad = $request->input('densidad');
        $ph = $request->input('ph');
        $proteinas = $request->input('proteinas');
        $urobilinogeno = $request->input('urobilinogeno');
        $nitratos = $request->input('nitratos');
        $hemoglobina = $request->input('hemoglobina');
        $glucosa = $request->input('glucosa');
        $cuerpos_cetonicos = $request->input('cuerpos_cetonicos');
        $leucocitos = $request->input('leucocitos');
        $eritrocitos = $request->input('eritrocitos');
        $celulas = $request->input('celulas');
        $filamento_mucoso = $request->input('filamento_mucoso');
        $bacterias = $request->input('bacterias');
        $cristales = $request->input('cristales');
        $trichomonas = $request->input('trichomonas');
        $otros_hallazgos = $request->input('otros_hallazgos');
        $id = $request->input('exam_id');

        // Pasa todas las variables a la vista
        $pdf = PDF::loadView('pdf.orina', compact(
            'color',
            'aspecto',
            'densidad',
            'ph',
            'proteinas',
            'urobilinogeno',
            'nitratos',
            'hemoglobina',
            'glucosa',
            'cuerpos_cetonicos',
            'leucocitos',
            'eritrocitos',
            'celulas',
            'filamento_mucoso',
            'bacterias',
            'cristales',
            'trichomonas',
            'otros_hallazgos'
        ));
        try {
            $pdfContent = $pdf->output();
            $fileName = 'reporte_' . time() . '.pdf';
            $filePath = 'pdf_files/' . $fileName;

            // Guarda el PDF en el directorio storage
            Storage::disk('public')->put($filePath, $pdfContent);

            $fileUrl = url('storage/' . $filePath);

            // Actualiza el examen con la ruta del PDF
            $examen = Exams::findOrFail($id);
            $examen->pdf_file = $fileUrl;
            $examen->save();
            
            return response()->json(['success' => 'PDF generado y guardado correctamente.']);

        } catch (\Exception $e) {
            return response()->json(['error', $e->getMessage()]);
        }
    }
}