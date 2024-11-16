import React, { useRef } from 'react';


interface ScrollContentProps {
    title: string;
    items: any[];
    renderItem: (item: any) => React.ReactNode;
  }


const ScrollContent = ({ title, items, renderItem }: ScrollContentProps) => {
  const scrollContainerRef = useRef<HTMLDivElement | null>(null);

  const scroll = (direction: 'left' | 'right') => {
    const container = scrollContainerRef.current;
    if (!container) return;
    const scrollAmount = 300;
    const newScrollPosition = container.scrollLeft + (direction === 'left' ? -scrollAmount : scrollAmount);
    container.scrollTo({
      left: newScrollPosition,
      behavior: 'smooth'
    });
  };

  return (
    <div className="w-full px-6 py-4">
      <div className="flex items-center justify-between mb-4">
        <h2 className="text-2xl font-bold text-gray-800">{title}</h2>
        <div className="flex gap-2">
          <button 
            onClick={() => scroll('left')}
            className="px-4 py-2 bg-black/70 hover:bg-black/90 text-white rounded-md transition-colors"
          >
            
          </button>
          <button 
            onClick={() => scroll('right')}
            className="px-4 py-2 bg-black/70 hover:bg-black/90 text-white rounded-md transition-colors"
          >
            
          </button>
        </div>
      </div>
      
      <div 
        ref={scrollContainerRef}
        className="flex gap-5 overflow-x-hidden scroll-smooth"
      >
        {items.map((item) => renderItem(item))}
      </div>
    </div>
  );
};

export default ScrollContent;