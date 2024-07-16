<?php

namespace App\View\PdfBase;

use App\Models\QuizProgress;
use App\UseCases\PDFTrait;
use Carbon\Carbon;
use tFPDF;

class PDFCertificate extends tFPDF
{
	use PDFTrait;


    protected QuizProgress $quizProgress;

    public function __construct(QuizProgress $quizProgress)
    {
        parent::__construct('P','mm','A3');
        $quizProgress->load('user', 'quiz.questions');
        $this->quizProgress = $quizProgress;
        $quizProgress->update(['date_cert' => Carbon::now()]);
        $this->setImage();
        $this->setData();
    }
    public function setImage()
    {
        $this->AddPage();
        $this->setFonts();
        $this->Image($this->pdfAsset('images/cert_min.jpg'), 0, 0, 297);
//        $this->Image($this->pdfAsset('images/cert_low.jpg'), 0, 0, 297);
    }

    public function setData()
    {
        $percent = floor(($this->quizProgress->points / $this->quizProgress->quiz->questions->count())*100);
        $this->SetXY(0, 300);
        $this->SetFont('DejaVu', '', 28);
        $this->SetTextColor(255,255,255);
        $this->MultiCell(297, 20, $this->quizProgress->quiz->title, 0, 'C');

        $this->SetXY(0, 260);
        $this->SetFont('DejaVu', '', 60);
        $this->SetTextColor(255,255,255);
        $this->MultiCell(297, 20, $this->quizProgress->user->name, 0, 'C');

        $this->SetXY(27, 365);
        $this->SetFont('DejaVu', '', 35);
        $this->SetTextColor(255,255,255);
        $this->MultiCell(25, 20, $percent, 0, 'C');

        $this->SetXY(0, 395);
        $this->SetFont('DejaVu', '', 25);
        $this->SetTextColor(130,130,130);
        $this->MultiCell(297, 0, Carbon::today()->translatedFormat('j F Y'), 0, 'C');


    }

}
