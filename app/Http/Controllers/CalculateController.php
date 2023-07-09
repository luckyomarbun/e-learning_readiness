<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultDownloadRequest;
use App\Models\Alternative;
use App\Models\AlternativeComparison;
use App\Models\Criteria;
use App\Models\CriteriaComparison;
use App\Models\IndeksRandomConsistency;
use App\Models\PriorityVectorAlternative;
use App\Models\PriorityVectorCriteria;
use App\Models\Rank;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criteriaComparisons = CriteriaComparison::with([
            'firstCriterias',
            'valueWeights',
            'secondCriterias'
        ])->get();

        $alternativeComparisons = AlternativeComparison::with([
            'firstAlternatives',
            'valueWeights',
            'secondAlternatives',
            'criterias'
        ])->get();

        $criterias = Criteria::all();
        $alternatives = Alternative::all();
        $distinctAlternativeCompare = AlternativeComparison::distinct()->get(["criteria_id"]);
        $calculateCriteria =[];

        if(count($criteriaComparisons) > 0){
            $calculateCriteria = $this->calculateCriteria($criterias, $criteriaComparisons);
        }

        $calculateAlternatives = [];
        if (count($alternativeComparisons) > 0) {
            $urut = 0;
            for($i=0; $i < count($distinctAlternativeCompare); $i++) {
                $alternativeComparison = AlternativeComparison::where('criteria_id',$distinctAlternativeCompare[$i]->criteria_id)->get();
                $calculateAlternative = $this->calculateAlternative($alternatives, $alternativeComparison, $urut);
                array_push($calculateAlternatives, $calculateAlternative);
                $urut++;
            }
        }

        $distinctPvAlternative = count(PriorityVectorAlternative::distinct()->get(["criteria_id"]));
        $distinctPvCriteria = count(PriorityVectorCriteria::distinct()->get(["criteria_id"]));

        $resultCriteriaPv = array();
        $resultAlternativePv = array();
        $valueResult = array();
        $rank=[];

        if ((count($criterias)==$distinctPvAlternative) && (count($criterias)==$distinctPvCriteria)) {
            for($i=0; $i <= count($criterias)-1; $i++) {
                $resCritPv = $this->resultCriteria($i);
                array_push($resultCriteriaPv, $resCritPv);
                for($j=0; $j <= count($alternatives)-1; $j++) {
                    $resAltPv = $this->resultAlternative($i, $j);
                    array_push($resultAlternativePv, $resAltPv);
                }
            }

            for($i=0; $i <= count($alternatives)-1; $i++) {
                $valueResult[$i] = 0;
                for($j=0; $j <= count($criterias)-1; $j++) {
                    $resAltPv = $this->resultAlternative($j, $i);
                    $resCritPv = $this->resultCriteria($j);
                    $valueResult[$i] += ($resAltPv * $resCritPv);
                }
            }

            $rank = $this->calulateResult(count($criterias),count($alternatives));
        }

        return view('calculate.index', [
            'title' => 'Calculate',
            'active' => 'calculate',
            'criterias' => $criterias,
            'alternatives' => $alternatives,
            'calculateCriteria' => $calculateCriteria,
            'calculateAlternatives' => $calculateAlternatives,
            'resultCriteriaPv' => $resultCriteriaPv,
            'resultAlternativePv' => $resultAlternativePv,
            'distinctPvAlternative' => $distinctPvAlternative,
            'distinctPvCriteria' => $distinctPvCriteria,
            'valueResult' => $valueResult,
            'rank'=> $rank
        ]);


    }

    public function downloadPdf()
    {
        $criteriaComparisons = CriteriaComparison::with([
            'firstCriterias',
            'valueWeights',
            'secondCriterias'
        ])->get();

        $alternativeComparisons = AlternativeComparison::with([
            'firstAlternatives',
            'valueWeights',
            'secondAlternatives',
            'criterias'
        ])->get();

        $criterias = Criteria::all();
        $alternatives = Alternative::all();
        $distinctAlternativeCompare = AlternativeComparison::distinct()->get(["criteria_id"]);
        $calculateCriteria =[];

        if(count($criteriaComparisons) > 0){
            $calculateCriteria = $this->calculateCriteria($criterias, $criteriaComparisons);
        }

        $calculateAlternatives = [];
        if (count($alternativeComparisons) > 0) {
            $urut = 0;
            for($i=0; $i < count($distinctAlternativeCompare); $i++) {
                $alternativeComparison = AlternativeComparison::where('criteria_id',$distinctAlternativeCompare[$i]->criteria_id)->get();
                $calculateAlternative = $this->calculateAlternative($alternatives, $alternativeComparison, $urut);
                array_push($calculateAlternatives, $calculateAlternative);
                $urut++;
            }
        }

        $distinctPvAlternative = count(PriorityVectorAlternative::distinct()->get(["criteria_id"]));
        $distinctPvCriteria = count(PriorityVectorCriteria::distinct()->get(["criteria_id"]));

        $resultCriteriaPv = array();
        $resultAlternativePv = array();
        $valueResult = array();
        $rank=[];

        if ((count($criterias)==$distinctPvAlternative) && (count($criterias)==$distinctPvCriteria)) {
            for($i=0; $i <= count($criterias)-1; $i++) {
                $resCritPv = $this->resultCriteria($i);
                array_push($resultCriteriaPv, $resCritPv);
                for($j=0; $j <= count($alternatives)-1; $j++) {
                    $resAltPv = $this->resultAlternative($i, $j);
                    array_push($resultAlternativePv, $resAltPv);
                }
            }

            for($i=0; $i <= count($alternatives)-1; $i++) {
                $valueResult[$i] = 0;
                for($j=0; $j <= count($criterias)-1; $j++) {
                    $resAltPv = $this->resultAlternative($j, $i);
                    $resCritPv = $this->resultCriteria($j);
                    $valueResult[$i] += ($resAltPv * $resCritPv);
                }
            }

            $rank = $this->calulateResult(count($criterias),count($alternatives));
        }

//        $options = new Options();
//        $options->set('isRemoteEnabled', true);
//
//        $dompdf = new Dompdf($options);
//        $dompdf->loadHtml();
//
//
//        $dompdf->setPaper("A4", "portrait");
//        $dompdf->render();
//        $dompdf->stream("file.pdf", ['Attachment' => false]);

        $pdf = PDF::loadview('calculate.result-download-test', [
            'title' => 'Calculate',
            'active' => 'calculate',
            'criterias' => $criterias,
            'alternatives' => $alternatives,
            'calculateCriteria' => $calculateCriteria,
            'calculateAlternatives' => $calculateAlternatives,
            'resultCriteriaPv' => $resultCriteriaPv,
            'resultAlternativePv' => $resultAlternativePv,
            'distinctPvAlternative' => $distinctPvAlternative,
            'distinctPvCriteria' => $distinctPvCriteria,
            'valueResult' => $valueResult,
            'rank'=> $rank
        ]);
//        return $pdf->download('ahp-result');
        return $pdf->stream();
//        return view('calculate.result-download-test', [
//            'title' => 'Calculate',
//            'active' => 'calculate',
//            'criterias' => $criterias,
//            'alternatives' => $alternatives,
//            'calculateCriteria' => $calculateCriteria,
//            'calculateAlternatives' => $calculateAlternatives,
//            'resultCriteriaPv' => $resultCriteriaPv,
//            'resultAlternativePv' => $resultAlternativePv,
//            'distinctPvAlternative' => $distinctPvAlternative,
//            'distinctPvCriteria' => $distinctPvCriteria,
//            'valueResult' => $valueResult,
//            'rank'=> $rank
//        ]);
    }

    public function report()
    {
        $criteriaComparisons = CriteriaComparison::with([
            'firstCriterias',
            'valueWeights',
            'secondCriterias'
        ])->get();

        $alternativeComparisons = AlternativeComparison::with([
            'firstAlternatives',
            'valueWeights',
            'secondAlternatives',
            'criterias'
        ])->get();

        $criterias = Criteria::all();
        $alternatives = Alternative::all();
        $distinctAlternativeCompare = AlternativeComparison::distinct()->get(["criteria_id"]);
        $calculateCriteria =[];

        if(count($criteriaComparisons) > 0){
            $calculateCriteria = $this->calculateCriteria($criterias, $criteriaComparisons);
        }

        $calculateAlternatives = [];
        if (count($alternativeComparisons) > 0) {
            $urut = 0;
            for($i=0; $i < count($distinctAlternativeCompare); $i++) {
                $alternativeComparison = AlternativeComparison::where('criteria_id',$distinctAlternativeCompare[$i]->criteria_id)->get();
                $calculateAlternative = $this->calculateAlternative($alternatives, $alternativeComparison, $urut);
                array_push($calculateAlternatives, $calculateAlternative);
                $urut++;
            }
        }

        $distinctPvAlternative = count(PriorityVectorAlternative::distinct()->get(["criteria_id"]));
        $distinctPvCriteria = count(PriorityVectorCriteria::distinct()->get(["criteria_id"]));

        $resultCriteriaPv = array();
        $resultAlternativePv = array();
        $valueResult = array();
        $rank=[];

        if ((count($criterias)==$distinctPvAlternative) && (count($criterias)==$distinctPvCriteria)) {
            for($i=0; $i <= count($criterias)-1; $i++) {
                $resCritPv = $this->resultCriteria($i);
                array_push($resultCriteriaPv, $resCritPv);
                for($j=0; $j <= count($alternatives)-1; $j++) {
                    $resAltPv = $this->resultAlternative($i, $j);
                    array_push($resultAlternativePv, $resAltPv);
                }
            }

            for($i=0; $i <= count($alternatives)-1; $i++) {
                $valueResult[$i] = 0;
                for($j=0; $j <= count($criterias)-1; $j++) {
                    $resAltPv = $this->resultAlternative($j, $i);
                    $resCritPv = $this->resultCriteria($j);
                    $valueResult[$i] += ($resAltPv * $resCritPv);
                }
            }

            $rank = $this->calulateResult(count($criterias),count($alternatives));
        }

//        return view('calculate.result-download', [
        return view('calculate.report', [
            'title' => 'Calculate',
            'active' => 'calculate',
            'criterias' => $criterias,
            'alternatives' => $alternatives,
            'calculateCriteria' => $calculateCriteria,
            'calculateAlternatives' => $calculateAlternatives,
            'resultCriteriaPv' => $resultCriteriaPv,
            'resultAlternativePv' => $resultAlternativePv,
            'distinctPvAlternative' => $distinctPvAlternative,
            'distinctPvCriteria' => $distinctPvCriteria,
            'valueResult' => $valueResult,
            'rank'=> $rank
        ]);
    }

    public function decree()
    {
        $criteriaComparisons = CriteriaComparison::with([
            'firstCriterias',
            'valueWeights',
            'secondCriterias'
        ])->get();

        $alternativeComparisons = AlternativeComparison::with([
            'firstAlternatives',
            'valueWeights',
            'secondAlternatives',
            'criterias'
        ])->get();

        $criterias = Criteria::all();
        $alternatives = Alternative::all();
        $distinctAlternativeCompare = AlternativeComparison::distinct()->get(["criteria_id"]);
        $calculateCriteria =[];

        if(count($criteriaComparisons) > 0){
            $calculateCriteria = $this->calculateCriteria($criterias, $criteriaComparisons);
        }

        $calculateAlternatives = [];
        if (count($alternativeComparisons) > 0) {
            $urut = 0;
            for($i=0; $i < count($distinctAlternativeCompare); $i++) {
                $alternativeComparison = AlternativeComparison::where('criteria_id',$distinctAlternativeCompare[$i]->criteria_id)->get();
                $calculateAlternative = $this->calculateAlternative($alternatives, $alternativeComparison, $urut);
                array_push($calculateAlternatives, $calculateAlternative);
                $urut++;
            }
        }

        $distinctPvAlternative = count(PriorityVectorAlternative::distinct()->get(["criteria_id"]));
        $distinctPvCriteria = count(PriorityVectorCriteria::distinct()->get(["criteria_id"]));

        $resultCriteriaPv = array();
        $resultAlternativePv = array();
        $valueResult = array();
        $rank=[];

        if ((count($criterias)==$distinctPvAlternative) && (count($criterias)==$distinctPvCriteria)) {
            for($i=0; $i <= count($criterias)-1; $i++) {
                $resCritPv = $this->resultCriteria($i);
                array_push($resultCriteriaPv, $resCritPv);
                for($j=0; $j <= count($alternatives)-1; $j++) {
                    $resAltPv = $this->resultAlternative($i, $j);
                    array_push($resultAlternativePv, $resAltPv);
                }
            }

            for($i=0; $i <= count($alternatives)-1; $i++) {
                $valueResult[$i] = 0;
                for($j=0; $j <= count($criterias)-1; $j++) {
                    $resAltPv = $this->resultAlternative($j, $i);
                    $resCritPv = $this->resultCriteria($j);
                    $valueResult[$i] += ($resAltPv * $resCritPv);
                }
            }

            $rank = $this->calulateResult(count($criterias),count($alternatives));
        }

//        return view('calculate.result-download', [
        return view('calculate.decree', [
            'title' => 'Calculate',
            'active' => 'calculate',
            'criterias' => $criterias,
            'alternatives' => $alternatives,
            'calculateCriteria' => $calculateCriteria,
            'calculateAlternatives' => $calculateAlternatives,
            'resultCriteriaPv' => $resultCriteriaPv,
            'resultAlternativePv' => $resultAlternativePv,
            'distinctPvAlternative' => $distinctPvAlternative,
            'distinctPvCriteria' => $distinctPvCriteria,
            'valueResult' => $valueResult,
            'rank'=> $rank
        ]);
    }

    function resultAlternative($x, $y)
    {
        return round($this->getAlternatifPV($this->getAlternatifID($y)->id, $this->getKriteriaID($x)->id), 5);
    }

    function resultCriteria($urut)
    {
        return round($this->getKriteriaPV($this->getKriteriaID($urut)->id),5);
    }

    function calulateResult($jmlKriteria,$jmlAlternatif){
        $nilai = array();
        for ($x=0; $x <= ($jmlAlternatif-1); $x++) {
            // inisialisasi
            $nilai[$x] = 0;

            for ($y=0; $y <= ($jmlKriteria-1); $y++) {
                $id_alternatif 	= $this->getAlternatifID($x);
                $id_kriteria	= $this->getKriteriaID($y);
                $pv_alternatif	= $this->getAlternatifPV($id_alternatif->id,$id_kriteria->id);
                $pv_kriteria	= $this->getKriteriaPV($id_kriteria->id);
                $nilai[$x]	 	+= ($pv_alternatif * $pv_kriteria);
            }
        }
        // update nilai ranking
        for ($i=0; $i <= ($jmlAlternatif-1); $i++) {
            $id_alternatif = $this->getAlternatifID($i);
            $this->inputRangking($id_alternatif,$nilai[$i]);
        }

        return Rank::with('alternative')->orderBy('value', 'DESC')->get();
    }
    function inputRangking($id_alternatif,$nilai){
        $rank = Rank::where('alternative_id', $id_alternatif['id'])->first();
        if ($rank) {
            $rank->value = $nilai;
            $rank->update();
        } else {
            $rank = new Rank();
            $rank->alternative_id = $id_alternatif['id'];
            $rank->value = $nilai;
            $rank->save();
        }
    }

    function calculateAlternative($n, $alternativeComparisons, $criteriaId)
    {
//        @dd($alternativeComparisons);
            $clength = count($n);
            $matrik = array();
            $urut = 0;
            for ($x = 0; $x <=  $clength - 2; $x++) {
                for ($y = ($x + 1); $y <=  $clength - 1; $y++) {
                    $matrik[$x][$y] = $alternativeComparisons[$urut]->value;
                    $matrik[$y][$x] = 1 / $alternativeComparisons[$urut]->value;
                    $urut++;
                }
            }

            // diagonal maka bernilai sama berat atau 1
            for ($i = 0; $i <= count($matrik) - 1; $i++) {
                $matrik[$i][$i] = 1;
            }

            //matrik perbandingan kriteria sudah sesuai

            // inisialisasi jumlah tiap kolom dan baris kriteria
            $jmlmpb = array();
            $jmlmnk = array();
            for ($i = 0; $i <= ($clength - 1); $i++) {
                $jmlmpb[$i] = 0;
                $jmlmnk[$i] = 0;
            }

            // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
            for ($x = 0; $x <= ($clength - 1); $x++) {
                for ($y = 0; $y <= ($clength - 1); $y++) {
                    $value        = $matrik[$x][$y];
                    $jmlmpb[$y] += $value;
                }
            }

            // menghitung jumlah pada baris kriteria tabel nilai kriteria
            // matrikb merupakan matrik yang telah dinormalisasi
            for ($x = 0; $x <= ($clength - 1); $x++) {
                for ($y = 0; $y <= ($clength - 1); $y++) {
                    $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
                    $value    = $matrikb[$x][$y];
                    $jmlmnk[$x] += $value;
                }

                // nilai priority vektor
                $pv[$x]     = $jmlmnk[$x] /  $clength;

                // memasukkan nilai priority vektor ke dalam tabel pv_kriteria dan pv_alternatif
                $id_kriteria	= $this->getKriteriaID($criteriaId); //$criteriaId
                $id_alternatif	= $this->getAlternatifID($x);
                $this->inputAlternatifPV($id_alternatif,$id_kriteria,$pv[$x]);
            }

            $eigenvektor = $this->getEigenVector($jmlmpb, $jmlmnk, $clength);
            $consIndex   = $this->getConsIndex($jmlmpb, $jmlmnk, $clength);
            $consRatio   = $this->getConsRatio($jmlmpb, $jmlmnk, $clength);

        return $calculateAlternative[] = [
            'criteriaId' => $criteriaId,
            'matrik' => $matrik,
            'jmlmpb' => $jmlmpb,
            'matrikb' => $matrikb,
            'jmlmnk' => $jmlmnk,
            'pv' => $pv,
            'eigenvektor' => $eigenvektor,
            'consIndex' => $consIndex,
            'consRatio' => $consRatio
        ];
    }

    // mencari priority vector alternatif
    function getAlternatifPV($id_alternatif,$id_kriteria) {
        $pvAlternative = PriorityVectorAlternative::where('alternative_id', $id_alternatif)->where('criteria_id', $id_kriteria)->first();
        return  $pvAlternative['value'] ?? 0;
    }

     // mencari priority vector criteria
     function getKriteriaPV($id_kriteria) {

        $pvCriteria = $pvCriteria = PriorityVectorCriteria::where('criteria_id', $id_kriteria)->first();

        return $pvCriteria['value'] ?? 0;
    }




    function calculateCriteria($n, $criteriaComparisons)
    {
        $matrik = array();
        $urut = 0;
        $clength = count($n);
        for ($x = 0; $x <=  $clength - 2; $x++) {
            for ($y = ($x + 1); $y <=  $clength - 1; $y++) {
                $matrik[$x][$y] = $criteriaComparisons[$urut]->value;
                $matrik[$y][$x] = 1 / $criteriaComparisons[$urut]->value;
                $urut++;
            }
        }

        // diagonal maka bernilai sama berat atau 1
        for ($i = 0; $i <= count($matrik) - 1; $i++) {
            $matrik[$i][$i] = 1;
        }

        //matrik perbandingan kriteria sudah sesuai

        // inisialisasi jumlah tiap kolom dan baris kriteria
        $jmlmpb = array();
        $jmlmnk = array();
        for ($i = 0; $i <= ($clength - 1); $i++) {
            $jmlmpb[$i] = 0;
            $jmlmnk[$i] = 0;
        }

        // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
        for ($x = 0; $x <= ($clength - 1); $x++) {
            for ($y = 0; $y <= ($clength - 1); $y++) {
                $value        = $matrik[$x][$y];
                $jmlmpb[$y] += $value;
            }
        }


        // menghitung jumlah pada baris kriteria tabel nilai kriteria
        // matrikb merupakan matrik yang telah dinormalisasi
        for ($x = 0; $x <= ($clength - 1); $x++) {
            for ($y = 0; $y <= ($clength - 1); $y++) {
                $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
                $value    = $matrikb[$x][$y];
                $jmlmnk[$x] += $value;
            }

            // nilai priority vektor
            $pv[$x]     = $jmlmnk[$x] /  $clength;

            // memasukkan nilai priority vektor ke dalam tabel pv_kriteria dan pv_alternatif
            $id_kriteria = $this->getKriteriaID($x);
            $this->inputKriteriaPV($id_kriteria, $pv[$x]);
        }

        $eigenvektor = $this->getEigenVector($jmlmpb, $jmlmnk, $clength);
        $consIndex   = $this->getConsIndex($jmlmpb, $jmlmnk, $clength);
        $consRatio   = $this->getConsRatio($jmlmpb, $jmlmnk, $clength);


        return $calculateCriteria[] = [
            'matrik' => $matrik,
            'jmlmpb' => $jmlmpb,
            'matrikb' => $matrikb,
            'jmlmnk' => $jmlmnk,
            'pv' => $pv,
            'eigenvektor' => $eigenvektor,
            'consIndex' => $consIndex,
            'consRatio' => $consRatio
        ];
    }

    // memasukkan nilai priority vektor alternatif
    function inputAlternatifPV($id_alternatif, $id_kriteria, $pv)
    {

        $pvAlternative = PriorityVectorAlternative::where('alternative_id', $id_alternatif['id'])->where('criteria_id', $id_kriteria['id'])->first();
        if ($pvAlternative) {
            $pvAlternative->value = $pv;
            $pvAlternative->update();
        } else {
            $pvAlternative = new PriorityVectorAlternative();
            $pvAlternative->alternative_id = $id_alternatif['id'];
            $pvAlternative->criteria_id = $id_kriteria['id'];
            $pvAlternative->value = $pv;
            $pvAlternative->save();
        }
    }

    // memasukkan nilai priority vektor kriteria
    function inputKriteriaPV($id_kriteria, $pv)
    {
        $pvCriteria = PriorityVectorCriteria::where('criteria_id', $id_kriteria['id'])->first();
        if ($pvCriteria) {
            $pvCriteria->criteria_id = $id_kriteria['id'];
            $pvCriteria->value = $pv;
            $pvCriteria->update();
        } else {
            $pvCriteria = new PriorityVectorCriteria();
            $pvCriteria->criteria_id = $id_kriteria['id'];
            $pvCriteria->value = $pv;
            $pvCriteria->save();
        }
    }

    function getAlternatifID($no_urut)
    {
        $alternativesId = Alternative::select('id')->orderBy('id', 'ASC')->get();
        foreach ($alternativesId as $id) {
            $listID[] = $id;
        }

        return $listID[($no_urut)];
    }

    function getKriteriaID($no_urut)
    {
        $criteriasId = Criteria::select('id')->orderBy('id', 'ASC')->get();
        // $criteriaId = Criteria::select('id')->where('id', $no_urut)->first();
        foreach ($criteriasId as $id) {
            $listID[] = $id;
        }

        return $listID[($no_urut)];
    }

    function getEigenVector($matrik_a, $matrik_b, $clength)
    {
        $eigenvektor = 0;
        for ($i = 0; $i <= ($clength - 1); $i++) {
            $eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) /  $clength));
        }

        return $eigenvektor;
    }

    // mencari Cons Index
    function getConsIndex($matrik_a, $matrik_b, $clength)
    {
        $eigenvektor = $this->getEigenVector($matrik_a, $matrik_b, $clength);
        $consindex = ($eigenvektor -  $clength) / ($clength - 1);

        return $consindex;
    }

    // Mencari Consistency Ratio
    function getConsRatio($matrik_a, $matrik_b, $clength)
    {
        $indeksRandomConsistency = IndeksRandomConsistency::select('value')->where('amount', $clength)->first();

        $consindex = $this->getConsIndex($matrik_a, $matrik_b, $clength);
        $consratio = $consindex / $indeksRandomConsistency->value;
        // ambil nilai IR konstanta di DB
        return $consratio;
    }

    public function criteriaComparisons()
    {
        return view('criteria-comparison.index', [
            'title' => 'Criteria Comparison',
            'active' => 'criteria-comparison'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
