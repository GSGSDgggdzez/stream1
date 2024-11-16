import { useEffect, useState } from 'react';
export default function Navbar() {
    const [isOpen, setIsOpen] = useState(false);

    useEffect(() => {
        const handleEscape = (event: KeyboardEvent) => {
          if (event.key === 'Escape' && isOpen) {
            setIsOpen(false);
          }
        };
    
        document.addEventListener('keydown', handleEscape);
    
        return () => {
          document.removeEventListener('keydown', handleEscape);
        };
      }, [isOpen]);

  return (
    <div className='px-10'>
    <nav className="container mx-auto ">
      <div className="flex flex-wrap items-center justify-between">
        <a href="/">
          <div className="flex items-center">
            <img src="/build/iii/logo.svg" alt="Logo" className="" />
          </div>
        </a>

        <div className="flex md:hidden">
          <button
            onClick={() => setIsOpen(!isOpen)}
            className="text-white hover:text-gray-300"
          >
            <svg className="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
          </button>
        </div>

        <div className={`${isOpen ? 'block' : 'hidden'} w-full md:hidden bg-black p-3 rounded-md absolute top-20 left-0 right-0 z-50`}>
          <div className="flex flex-col space-y-2">
            <a href="/" className="text-white hover:bg-[#1A1A1A] hover:rounded-lg px-3 py-2">Home</a>
            <a href="/MoviesShows" className="text-white hover:bg-[#1A1A1A] hover:rounded-lg px-3 py-2">Movies & Shows</a>
            <a href="#" className="text-white hover:bg-[#1A1A1A] hover:rounded-lg px-3 py-2">Support</a>
            <a href="#" className="text-white hover:bg-[#1A1A1A] hover:rounded-lg px-3 py-2">Subscriptions</a>
          </div>
        </div>

        <div className="hidden lg:flex w-full md:w-auto md:items-center bg-black p-3 rounded-md">
          <div className="flex flex-col md:flex-row md:space-x-4">
            <a href="/" className="text-white hover:bg-[#1A1A1A] hover:rounded-lg px-3 py-2">Home</a>
            <a href="/MoviesShows" className="text-white hover:bg-[#1A1A1A] hover:rounded-lg px-3 py-2">Movies & Shows</a>
            <a href="#" className="text-white hover:bg-[#1A1A1A] hover:rounded-lg px-3 py-2">Support</a>
            <a href="#" className="text-white hover:bg-[#1A1A1A] hover:rounded-lg px-3 py-2">Subscriptions</a>
          </div>
        </div>

        <div className="hidden md:flex space-x-4">
          <button className="text-white hover:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="w-6 h-6">
              <path strokeLinecap="round" strokeLinejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
          </button>
          <button className="text-white hover:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="w-6 h-6">
              <path strokeLinecap="round" strokeLinejoin="round" d="M21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
          </button>
        </div>
      </div>
    </nav>
  </div>
  )
}
