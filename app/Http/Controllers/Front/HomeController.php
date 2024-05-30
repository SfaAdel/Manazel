<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUsCounter;
use App\Models\Advantage;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Customer;
use App\Models\CustomerReview;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Title;
use App\Models\WhyUs;
use Illuminate\Http\Request;
use SebastianBergmann\LinesOfCode\Counter;

class HomeController extends Controller
{
    //

    public function index()
    {
        //
        // $mainSection = Title::where('section', 'main')->first();

        $categories = Category::latest()->get();
        $serviceSection = Title::where('section', 'services')->first();

        $teams = Team::latest()->limit(4)->get();
        $teamSection = Title::where('section', 'teams')->first();

        $titles = Title::latest()->limit(4)->get();

        $advantages = Advantage::latest()->limit(5)->get();
        $advantageSection = Title::where('section', 'advantages')->first();

        $blogs = Blog::latest()->limit(4)->get();
        $blogSection = Title::where('section', 'blogs')->first();

        $testimonials = Testimonial::latest()->get();
        $testimonialSection = Title::where('section', 'testimonials')->first();

        $contactSection = Title::where('section', 'contacts')->first();
        $aboutSection = Title::where('section', 'about_us')->first();

        $whyUsAnsweres = WhyUs::latest()->limit(4)->get();
        $counters=AboutUsCounter::latest()->limit(3)->get();

        return view('front.index', compact( 'aboutSection','testimonialSection','blogSection','advantageSection','teamSection', 'serviceSection','categories','teams','titles','advantages','blogs','testimonials','whyUsAnsweres','counters'));
    }

    public function service($id)
    {
        // Fetch all services where category_id matches the given id
        $services = Service::where('category_id', $id)->latest()->get();
        $category = Category::find($id);

        return view('front.services', compact('services','category'));
    }

    public function service_details($id)
    {
        // Fetch all services where category_id matches the given id
        $sub_services = SubService::where('service_id', $id)->latest()->get();
        $service = Service::find($id);

        return view('front.service_details', compact('sub_services','service'));
    }

    public function sub_service_details($id)
    {
        // Fetch all services where category_id matches the given id
        $sub_service = SubService::with('reviews.customer')->find($id);

        return view('front.sub_service_details', compact('sub_service'));
    }

    public function submit_review(Request $request, $id)
    {
        $request->validate([
            'rate' => 'required|integer|between:1,5',
            'comment' => 'required|string',
            // 'name' => 'required|string',
            // 'email' => 'required|email',
        ]);

        $review = new CustomerReview();
        $review->sub_service_id = $id;
        $review->customer_id = Customer::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        )->id;
        $review->stars = $request->rate;
        $review->comment = $request->comment;
        $review->save();

        return redirect()->back()->with('success', 'تم اضافة المراجعة بنجاح');
    }

}
