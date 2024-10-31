// Import necessary dependencies
import React, { useState } from 'react'
import PaymentLayout from '@/Layouts/PaymentLayout';
import { Head } from '@inertiajs/react';
import { useForm } from '@inertiajs/react';


export default function Payment() {
  const [selectedPlan, setSelectedPlan] = useState('standard');
  const [showPaymentForm, setShowPaymentForm] = useState(false);
  const { post, processing, setData, data } = useForm({
    card_number: '',
    expiry_date: '',
    cvv: '',
    card_holder: '',
    subscription_type: '',
    subscription_amount: 0,
    end_date: '',
  });

  // these is fir Cart number 
  const formatCardNumber = (value: string) => {
    const v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
    const matches = v.match(/\d{4,16}/g);
    const match = matches && matches[0] || '';
    const parts = [];

    for (let i = 0, len = match.length; i < len; i += 4) {
      parts.push(match.substring(i, i + 4));
    }

    if (parts.length) {
      return parts.join(' ');
    } else {
      return value;
    }
  };
  // these is for Expiry date
  const formatExpiryDate = (value: string) => {
    const v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
    if (v.length >= 2) {
      return `${v.substring(0, 2)}/${v.substring(2, 4)}`;
    }
    return v;
  };
  // these is for CVV
  const formatCVV = (value: string) => {
    return value.replace(/\s+/g, '').replace(/[^0-9]/gi, '').substring(0, 4);
  }
  // Define available subscription plans with their features and pricing
  const plans = [
    {
      name: 'Basic',
      price: '2.99',
      quality: 'Good',
      resolution: '720p',
      devices: ['Phone', 'Tablet', 'Computer', 'TV'],
      features: ['Ad-free entertainment', 'Basic Streaming', 'Download on 1 devices', 'Supported:Mobile phone, tablet']
    }, {
      name: 'Standard',
      price: '7.49',
      quality: 'Better',
      resolution: '1080p',
      devices: ['Phone', 'Tablet', 'Computer', 'TV'],
      features: ['Ad-free entertainment', 'HD Streaming', 'Watch on 2 devices', 'Download on 2 devices', 'Supported:TV, computer, mobile phone, tablet']
    },
    {
      name: 'Premium',
      price: '10.99',
      quality: 'Best',
      resolution: '4K+HDR',
      devices: ['Phone', 'Tablet', 'Computer', 'TV'],
      features: ['Ad-free entertainment', 'Ultra HD Streaming', 'Watch on 4 devices', 'Download on 4 devices', 'High sound quality ', 'Supported:TV, computer, mobile phone, tablet']
    }
    // ... other plans
  ];

  // Handle plan selection when user clicks on a plan card
  const handlePlanSelect = (planName: string) => {
    setSelectedPlan(planName.toLowerCase());
  };

  const handleShowPaymentForm = () => {
    const selectedPlanDetails = plans.find(plan => plan.name.toLowerCase() === selectedPlan);
    const endDate = new Date();
    endDate.setMonth(endDate.getMonth() + 1);
    
    setData({
      ...data,
      subscription_type: selectedPlan,
      subscription_amount: parseFloat(selectedPlanDetails!.price),
      end_date: endDate.toISOString().split('T')[0] // Add this line
    });
    setShowPaymentForm(true);
  };

  const handleSubmitPayment = () => {
    post('/subscription');
  }

  return (
    <PaymentLayout>
      <Head title="Choose Your Plan" />
      <div className="py-12 text-white">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="overflow-hidden shadow-sm sm:rounded-lg p-6">
            {!showPaymentForm ? (
              <>
                <h2 className="text-4xl font-extrabold text-center mb-12 text-white">
                  Choose the plan that's right for you
                </h2>

                <div className="grid md:grid-cols-3 gap-8 mb-12">
                  {plans.map((plan) => (
                    <div
                      key={plan.name}
                      className={`border rounded-lg p-8 cursor-pointer transition-all ${selectedPlan === plan.name.toLowerCase()
                        ? 'border-[#E50000] bg-[#E50000]/10'
                        : 'border-gray-700 hover:border-[#E50000]'
                        }`}
                      onClick={() => handlePlanSelect(plan.name)}
                    >
                      <h3 className="text-2xl font-bold mb-4 text-white">{plan.name}</h3>
                      <p className="text-4xl font-bold mb-6 text-[#E50000]">${plan.price}</p>
                      <p className="text-gray-300 mb-2">Video quality: {plan.quality}</p>
                      <p className="text-gray-300 mb-6">Resolution: {plan.resolution}</p>

                      <div className="space-y-3">
                        {plan.features.map((feature, index) => (
                          <div key={index} className="flex items-center">
                            <svg className="w-5 h-5 text-[#E50000] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span className="text-gray-200">{feature}</span>
                          </div>
                        ))}
                      </div>
                    </div>
                  ))}
                </div>

                <div className="text-center">
                  <button
                    onClick={handleShowPaymentForm}
                    className="bg-[#E50000] text-white px-12 py-4 rounded-md text-lg font-semibold hover:bg-[#E50000]/90 transition-colors"
                  >
                    Subscribe Now
                  </button>
                </div>
              </>
            ) : (
              <div className="max-w-md mx-auto">
                <h2 className="text-2xl font-bold mb-8 text-center">Complete Your Payment</h2>
                <div className="bg-[#0f0f0f] p-6 rounded-lg mb-6">
                  <p className="text-gray-400 mb-2">Selected Plan</p>
                  <p className="text-xl font-bold mb-1 capitalize">{selectedPlan}</p>
                  <p className="text-[#E50000] text-2xl font-bold">
                    ${plans.find(plan => plan.name.toLowerCase() === selectedPlan)?.price}/month
                  </p>
                </div>

                <form className="space-y-6" onSubmit={(e) => { e.preventDefault(); handleSubmitPayment(); }}>
                  <div>
                    <label className="block text-sm font-medium mb-2">Card Holder Name</label>
                    <input
                      type="text"
                      className="w-full bg-[#0f0f0f] border border-gray-700 rounded-md px-4 py-2 text-white"
                      onChange={e => setData('card_holder', e.target.value.toUpperCase())}
                      placeholder="JOHN DOE"
                      maxLength={50}
                      required
                    />
                  </div>

                  <div>
                    <label className="block text-sm font-medium mb-2">Card Number</label>
                    <input
                      type="text"
                      className="w-full bg-[#0f0f0f] border border-gray-700 rounded-md px-4 py-2 text-white"
                      onChange={e => setData('card_number', formatCardNumber(e.target.value))}
                      placeholder="Please use 4111 1111 1111 1111"
                      maxLength={19}
                      required
                    />
                  </div>

                  <div className="grid grid-cols-2 gap-4">
                    <div>
                      <label className="block text-sm font-medium mb-2">Expiry Date</label>
                      <input
                        type="text"
                        placeholder="MM/YY"
                        className="w-full bg-[#0f0f0f] border border-gray-700 rounded-md px-4 py-2 text-white"
                        onChange={e => setData('expiry_date', formatExpiryDate(e.target.value))}
                        maxLength={5}
                        required
                      />
                    </div>
                    <div>
                      <label className="block text-sm font-medium mb-2">CVV</label>
                      <input
                        type="password"
                        className="w-full bg-[#0f0f0f] border border-gray-700 rounded-md px-4 py-2 text-white"
                        onChange={e => setData('cvv', formatCVV(e.target.value))}
                        placeholder="•••"
                        maxLength={4}
                        required
                      />
                    </div>
                  </div>

                  <button
                    type="submit"
                    disabled={processing}
                    className="w-full bg-[#E50000] text-white py-3 rounded-md font-semibold hover:bg-[#E50000]/90 transition-colors"
                  >
                    {processing ? 'Processing...' : 'Pay Now'}
                  </button>
                </form>
              </div>
            )}
          </div>
        </div>
      </div>
    </PaymentLayout>
  );
}
