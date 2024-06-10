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
use App\Models\SubServiceAvailability;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Title;
use App\Models\WhyUs;
use Illuminate\Http\Request;
use Carbon\Carbon;

use SebastianBergmann\LinesOfCode\Counter;

class HomeController extends Controller
{
    //

    public function index()
    {
        //
        // $mainSection = Title::where('section', 'main')->first();

        $navCategories = Category::latest()->get();

        $categories = Category::latest()->limit(4)->get();
        $serviceSection = Title::where('section', 'services')->first();

        $teams = Team::latest()->limit(4)->get();
        $teamSection = Title::where('section', 'teams')->first();

        $titles = Title::latest()->limit(4)->get();

        $advantages = Advantage::latest()->limit(6)->get();
        $advantageSection = Title::where('section', 'advantages')->first();

        $blogs = Blog::latest()->limit(4)->get();
        $blogSection = Title::where('section', 'blogs')->first();

        $testimonials = Testimonial::latest()->get();
        $testimonialSection = Title::where('section', 'testimonials')->first();

        $contactSection = Title::where('section', 'contacts')->first();
        $aboutSection = Title::where('section', 'about_us')->first();

        $whyUsAnsweres = WhyUs::latest()->limit(4)->get();
        $whyUsSection = Title::where('section', 'advantages')->first();

        $mainSection = Title::where('section', 'main')->first();

        $counters=AboutUsCounter::latest()->limit(3)->get();

        $subServicesWithOffer = SubService::where('offer', 1)->get();

        return view('front.index', compact('subServicesWithOffer','navCategories','mainSection','contactSection','whyUsSection', 'aboutSection','testimonialSection','blogSection','advantageSection','teamSection', 'serviceSection','categories','teams','titles','advantages','blogs','testimonials','whyUsAnsweres','counters'));
    }

    public function service($id)
    {
        // Fetch all services where category_id matches the given id
        $services = Service::where('category_id', $id)->latest()->get();
        $category = Category::find($id);
        $navCategories = Category::latest()->get();

        return view('front.services', compact('navCategories','services','category'));
    }

    public function service_details($id)
    {
        // Fetch all services where category_id matches the given id
        $sub_services = SubService::where('service_id', $id)->latest()->get();
        $service = Service::find($id);
        $navCategories = Category::latest()->get();

        return view('front.service_details', compact('navCategories','sub_services','service'));
    }

    public function sub_service_details($id)
    {
        // Fetch all services where category_id matches the given id
        $sub_service = SubService::with('reviews.customer')->find($id);

        $subService = SubService::with('availabilities')->findOrFail($id);

        // Fetch available dates and times within the next 30 days
        $availabilities = SubServiceAvailability::where('sub_service_id', $id)
            ->where('day', '>=', Carbon::today())
            ->where('day', '<=', Carbon::today()->addDays(30))
            ->where('availability', true)
            ->get()
            ->groupBy('day');

        $navCategories = Category::latest()->get();

        return view('front.sub_service_details', compact('navCategories','sub_service','availabilities'));
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

    public function contact()
    {

        $contactSection = Title::where('section', 'contacts')->first();
        $navCategories = Category::latest()->get();

        return view('front.contact', compact('contactSection','navCategories'));
    }

    public function about()
    {
        $teams = Team::latest()->get();
        $teamSection = Title::where('section', 'teams')->first();

        $advantages = Advantage::latest()->get();
        $advantageSection = Title::where('section', 'advantages')->first();

        $contactSection = Title::where('section', 'contacts')->first();
        $aboutSection = Title::where('section', 'about_us')->first();

        $whyUsAnsweres = WhyUs::latest()->get();
        $whyUsSection = Title::where('section', 'advantages')->first();

        $counters=AboutUsCounter::latest()->limit(3)->get();

        $navCategories = Category::latest()->get();

        return view('front.about', compact('navCategories','whyUsAnsweres','whyUsSection','counters','teams','teamSection', 'advantages','advantageSection','contactSection','aboutSection'));
    }

    public function blog()
    {
        $blogs = Blog::latest()->get();
        $blogSection = Title::where('section', 'blogs')->first();
        $categories = Category::latest()->get();
        $navCategories = Category::latest()->get();

        return view('front.blogs', compact('navCategories','blogs','blogSection','categories'));
    }

    public function blog_details($id)
    {
        $blog = Blog::find($id);
        $navCategories = Category::latest()->get();

        return view('front.blog_details', compact('blog','navCategories'));
    }

    public function filterByCategory($id = null)
    {
        $categories = Category::all();
        $blogSection = Title::where('section', 'blogs')->first();
        $navCategories = Category::latest()->get();

        if ($id) {
            $blogs = Blog::where('category_id', $id)->get();
            $selectedCategory = Category::find($id);
        } else {
            $blogs = Blog::all();
            $selectedCategory = null;
        }

        $noBlogsMessage = $blogs->isEmpty() ? 'لا يوجد مدونات في هذه الفئة' : '';

        return view('front.blogs', compact('blogs', 'categories', 'blogSection', 'navCategories', 'selectedCategory', 'noBlogsMessage'));
    }



    public function all_categories()
    {
        $navCategories = Category::latest()->get();

        return view('front.categories', compact('navCategories'));
    }

    public function provider_form()
    {
        $navCategories = Category::latest()->get();

        return view('front.provider_form', compact('navCategories'));
    }



}
