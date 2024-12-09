import type { NextConfig } from "next";

const nextConfig: NextConfig = {
  /* config options here */
  images : {
    domains: ["res.cloudinary.com", "placehold.co"],
  },

  port : {
    default : 3000,
    https : 443,
  }
};

export default nextConfig;
