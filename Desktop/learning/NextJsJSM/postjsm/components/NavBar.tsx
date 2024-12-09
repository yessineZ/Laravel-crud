"use client"
import React, { useEffect, useState } from 'react';
import Image from 'next/image';
import Link from 'next/link';
import { signIn, signOut, useSession } from 'next-auth/react'; 

const NavBar = () => {
  const [loading,setLoading] = useState<boolean>(false) ; 
  const { data: session, status } = useSession();

  useEffect(() => {
    if (status !== 'loading') {
      setLoading(false);
    }
  }, [status]);

  return (
    <header className="px-5 py-3 bg-white shadow-sm font-work-sans">
      <nav className="flex justify-between items-center">
        <Link href="/">
          <Image src="/next.svg" alt="logo" width={144} height={30} />
        </Link>

        <div className="flex items-center gap-5 text-black">
          {loading ? (
            <span>Loading...</span> 
          ) : session?.user ? (
            <>
              <Link href="/startup/create">
                <span>Create</span>
              </Link>

              <button
                onClick={async () => await signOut()}
                className="text-red-500 hover:underline"
                aria-label="Logout"
              >
                Logout
              </button>

              <Link href={`/user/${session?.id}`}>
                <span className="font-semibold">{session.user.name}</span>
              </Link>
            </>
          ) : (
            <button
              onClick={async () => await signIn('github')}
              className="text-blue-500 hover:underline"
              aria-label="Login with GitHub"
            >
              Login
            </button>
          )}
        </div>
      </nav>
    </header>
  );
};

export default NavBar;