import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';
import { PropsWithChildren, useEffect, useState } from 'react';

export default function Guest({ children }: PropsWithChildren) {
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
    <div className='bg-[#080808] '>
      <div className="min-h-screen">
        <main className="container mx-auto">{children}</main>
      </div>
    </div>
  );
}