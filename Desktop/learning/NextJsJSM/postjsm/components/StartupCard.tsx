import { formatDate } from '@/lib/utils'
import { EyeIcon } from 'lucide-react'
import Image from 'next/image'
import Link from 'next/link'
import React from 'react'
import { Button } from './ui/button'

const StartupCard = ({ post } : {post : StartupCardType }) => {
  return (
    <li className='startup-card group'>
        <div className='flex-between'>
          <p className='startup_card_date'>
            {formatDate(post._createdAt)}
          </p>
          <div className='flex gap-1.5'>
            <EyeIcon className='text-red-600'/>
            <span>{post.views}</span>
          </div>
        </div>

        <div className='flex-between mt-5 gap-5'>
          <div className='flex-1'>
            <Link href={`/user/${post.author?._id}`}>
             <p className='text-16-medium line-clamp-1'>
                {post.author?.name}
              </p> 
            </Link>

            <Link href={`/startup/${post._id}`}>
              <h2 className='text-26-semibold'>
                {post.title}
              </h2>
            </Link>
          </div>
            <Link href={`/user/${post.author?._id}`}>
        <Image src={'https://res.cloudinary.com/dj8fq0bd0/image/upload/v1722108376/z3waw0jxerhrmqzzxsat.png'} alt='placeholder' height={48} width={48} className='rounded-full' />
        </Link>
        </div>

        <Link href={`/startup/${post._id}`}>
          <p className='startup-card_desc'>
            {post.description}
          </p>

          <img src={post?.image} alt='placeholder' className='startup-card_img'/>
          
          <div className='flex-between gap-3 mt-5'>
            <Link href={`/query=${post.category.toLowerCase()}`}>
            <p className='text-16-medium'>
              #{post.category}
            </p>

            </Link>
            <Button className='startup-card_btn' asChild>
                <Link href={`/startup/${post._id}`}>
                  Details
                </Link>
            </Button>
            

          </div>



        </Link>
        


    </li>
  )
}

export default StartupCard
