<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\sections;
use Illuminate\Http\Request;

class CustomersReportController extends Controller
{
    public function index()
    {
        $sections = sections::all();
        // تعريف القيم الافتراضية للمخرجات
        $Section = null;
        $product = null;
        $start_at = null;
        $end_at = null;
        $details = null; // مبدئيًا فارغ

        return view('reports.customers_report', compact('sections', 'Section', 'product', 'start_at', 'end_at', 'details'));
    }

    public function Search_customers(Request $request)
    {
        $sections = sections::all(); // جلب جميع الأقسام

        // القيم المدخلة من الطلب
        $Section = $request->Section ?? null;
        $product = $request->product ?? null;
        $start_at = $request->start_at ?? null;
        $end_at = $request->end_at ?? null;

        // استعلام الفواتير
        $query = invoices::query();

        // إضافة شروط البحث حسب المدخلات
        if ($Section) {
            $query->where('section_id', $Section);
        }

        if ($product) {
            $query->where('product', $product);
        }

        if ($start_at && $end_at) {
            $query->whereBetween('invoice_Date', [$start_at, $end_at]);
        }

        $details = $query->get(); // جلب النتائج

        // إرسال البيانات إلى العرض
        return view('reports.customers_report', compact('sections', 'details', 'Section', 'product', 'start_at', 'end_at'));
    }
}
