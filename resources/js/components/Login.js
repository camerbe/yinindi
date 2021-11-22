import React, { Component, useState } from "react";
import ReactDOM from "react-dom";
import { LoginIcon } from "@heroicons/react/solid";
import Logo from "../utils/Logo";

const Login = () => {
    const [{ email, password }, setSignIn] = useState({
        email: "",
        password: "",
    });

    return (
        <div className="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
            <div className="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
                <h1 className="font-bold text-center text-2xl ">
                    <Logo />
                </h1>
                <div className="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                    <div className="px-5 py-5">
                        <label className="font-semibold text-sm text-gray-600 pb-1 block">
                            E-mail
                        </label>
                        <input
                            type="text"
                            className="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                        />
                        <label className="font-semibold text-sm text-gray-600 pb-1 block">
                            Password
                        </label>
                        <input
                            type="text"
                            className="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                        />
                        <button
                            type="button"
                            className="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block"
                        >
                            <span className="inline-block mr-2">Login</span>
                            <LoginIcon class="w-4 h-4 inline-block" />
                        </button>
                    </div>
                    <div className="py-3">
                        <div className="grid grid-cols-1 gap-1">
                            <div className="text-center sm:text-left whitespace-nowrap">
                                <button className="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        class="w-4 h-4 inline-block align-text-top"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"
                                        />
                                    </svg>
                                    <span className="inline-block ml-1">
                                        Forgot Password
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Login;
