<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exams;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfController extends Controller
{
    public function generatePDF(Request $request)
    {
        $tipo = $request->input('exam-type');
        $id = $request->input('exam_id');

        try {
            $pdf = $this->createPDF($tipo, $request);

            $pdfContent = $pdf->output();
            $fileName = 'reporte_' . time() . '.pdf';
            $filePath = 'pdf_files/' . $fileName;

            // Guarda el PDF en el directorio storage
            Storage::disk('public')->put($filePath, $pdfContent);

            $fileUrl = url('storage/' . $filePath);

            // Actualiza el examen con la ruta del PDF
            $this->updateExamPDF($id, $fileUrl);

            return response()->json(['success' => 'PDF generado y guardado correctamente.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    private function createPDF($tipo, Request $request)
    {
        $viewData = $this->getExamData($tipo, $request);

        return PDF::loadView('pdf.' . $tipo, $viewData);
    }



    private function getExamData($tipo, Request $request)
    {
        $data = [];

        if ($tipo === "urine") {
            $data = [
                'color' => $request->input('color'),
                'aspecto' => $request->input('aspecto'),
                'densidad' => $request->input('densidad'),
                'ph' => $request->input('ph'),
                'proteinas' => $request->input('proteinas'),
                'urobilinogeno' => $request->input('urobilinogeno'),
                'nitratos' => $request->input('nitratos'),
                'hemoglobina' => $request->input('hemoglobina'),
                'glucosa' => $request->input('glucosa'),
                'cuerpos_cetonicos' => $request->input('cuerpos_cetonicos'),
                'leucocitos' => $request->input('leucocitos'),
                'eritrocitos' => $request->input('eritrocitos'),
                'celulas' => $request->input('celulas'),
                'filamento_mucoso' => $request->input('filamento_mucoso'),
                'bacterias' => $request->input('bacterias'),
                'cristales' => $request->input('cristales'),
                'trichomonas' => $request->input('trichomonas'),
                'otros_hallazgos' => $request->input('otros_hallazgos')
            ];
        } elseif ($tipo === "blood") {
            $data = [
                'Eritrocitos' => $request->input('Eritrocitos'),
                'Hemoglobina' => $request->input('Hemoglobina'),
                'Hcto' => $request->input('Hcto'),
                'VCM' => $request->input('VCM'),
                'HCM' => $request->input('HCM'),
                'Leucositos' => $request->input('Leucositos'),
                'Basofilos' => $request->input('Basofilos'),
                'Eusinofilos' => $request->input('Eusinofilos'),
                'Neutrofilos' => $request->input('Neutrofilos'),
                'Segmentados' => $request->input('Segmentados'),
                'Linfocitos' => $request->input('Linfocitos'),
                'VHS' => $request->input('VHS'),
            ];
        } elseif ($tipo === "stool") {
            $data = [
                'color' => $request->input('color'),
                'consistencia' => $request->input('consistencia'),
                'sangre_oculta' => $request->input('sangre_oculta'),
                'moco' => $request->input('moco'),
                'parásitos' => $request->input('parásitos'),
                'observaciones' => $request->input('observaciones'),
            ];
        }

        return $data;
    }

    private function updateExamPDF($id, $fileUrl)
    {
        $examen = Exams::findOrFail($id);
        $examen->pdf_file = $fileUrl;
        $examen->save();
    }
}