import { usePage } from '@inertiajs/react';
import { PageProps } from '@/types';
import Main from '@/Layouts/Main';
import Navbar from '@/Components/Navbar';
import CTA from '@/Components/CTA';
import FAQ from '@/Components/FAQ';
import ScrollContent from '@/Components/ScrollContent';
import DeviceSection from '@/Components/DeviceSection';

export default function Welcome() {
  const { auth } = usePage<PageProps>().props;
  const { selectedProfile } = auth;

  return (
    <Main>
      <section className="relative mb-[180px]">
        {/* Hero image for large screens */}
        <img src="/build/iii/hero1.svg" alt="" className="hidden md:block w-full" />

        {/* Hero image for small screens */}
        <img src="/build/iii/Sub.svg" alt="" className="md:hidden w-full" />

        {/* Navigation bar */}
        <div className="absolute top-0 left-0 right-0 mx-12 my-8">
          <Navbar />
        </div>

        {/* Hero content */}
        <div
          className="flex justify-center items-center absolute top-[430px] left-0 right-0"
          style={{
            background: "linear-gradient(0deg, rgba(1,1,1,1) 59%, rgba(164,66,66,0) 100%)"
          }}
        >
          <div className="text-center">
            <div className="text-white font-bold my-4 text-4xl">
              The Best Streaming Experience
            </div>

            {/* Description for large screens */}
            <div className="hidden md:block text-sm mx-8 text-[#999999]">
              StreamVibe is the best streaming experience for watching your favorite movies and shows on demand,
              anytime, anywhere. With StreamVibe, you can enjoy a wide variety of content, including the latest
              blockbusters, classic movies, popular TV shows, and more. You can also create your own watchlists,
              so you can easily find the content you want to watch.
            </div>

            {/* Description for small screens */}
            <div className="md:hidden text-xs mx-8 text-[#999999]">
              StreamVibe is the best streaming experience for watching your favorite movies and shows on demand,
              anytime, anywhere.
            </div>

            {/* CTA Button */}
            <button className="my-3 text-white bg-[#E50000] p-4 rounded-md transition duration-150 ease-in-out">
              <div className="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                </svg>
                Start Watching Now
              </div>
            </button>
          </div>
        </div>
      </section>
      {/* these is the new section of the code  */}
      <section>
        <div className="min-h-screen">
          {/* <ScrollContent /> */}
        </div>
      </section>
      {/* these is the new section of the code */}
      <section>
        <div>
        {/* <DeviceSection/> */}
        </div>
      </section>
      {/* these is the new section of the code */}
      <section>
        <div>
        {/* <DeviceSection/> */}
        </div>
      </section>
      {/* Add FAQ section */}
      
    </Main>
  );
}




// export default function Welcome() {
//   // Add your data fetching logic here
//   const topMovies = [/* your movie data */];
//   const topViewed = [/* your most viewed data */];

//   return (
//     <Main>
//       {/* ... existing hero section ... */}
      
//       <section>
//         <div className="min-h-screen bg-gray-100">
//           <ScrollContent 
//             title="Top Movies"
//             items={topMovies}
//             renderItem={(movie) => (
//               <div key={movie.id} className="flex-none w-[200px] h-[300px] bg-gray-800 rounded-lg">
//                 <img src={movie.poster} alt={movie.title} />
//               </div>
//             )}
//           />
          
//           <ScrollContent 
//             title="Most Viewed"
//             items={topViewed}
//             renderItem={(item) => (
//               <div key={item.id} className="flex-none w-[200px] h-[300px] bg-gray-800 rounded-lg">
//                 <img src={item.image} alt={item.title} />
//               </div>
//             )}
//           />
//         </div>
//       </section>
//     </Main>
//   );
// }
