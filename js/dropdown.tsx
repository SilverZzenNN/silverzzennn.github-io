import React, { useState } from 'react';
import { ChevronDown, ChevronUp } from 'lucide-react';

const ImageGallery = () => {
  const [expandedCategory, setExpandedCategory] = useState(null);

  const galleries = {
    airrifle: {
      title: "Senjata Air Rifle Match",
      description: "Sebuah Senapan Angin dengan menggunakan tenaga dari tabung angin.",
      mainImage: "/api/placeholder/400/300",
      relatedImages: [
        "/api/placeholder/200/150",
        "/api/placeholder/200/150",
        "/api/placeholder/200/150"
      ],
      badge: 14,
      badgeClass: "bg-design"
    },
    airpistol: {
      title: "Senjata Air Pistol",
      description: "Sebuah Pistol Angin dengan menggunakan tenaga dari tabung angin.",
      mainImage: "/api/placeholder/400/300",
      relatedImages: [
        "/api/placeholder/200/150",
        "/api/placeholder/200/150",
        "/api/placeholder/200/150"
      ],
      badge: 30,
      badgeClass: "bg-advertising"
    },
    centerfire: {
      title: "Centre Fire Pistol",
      description: "Sebuah Pistol Api dengan kaliber 9mm",
      mainImage: "/api/placeholder/400/300",
      relatedImages: [
        "/api/placeholder/200/150",
        "/api/placeholder/200/150",
        "/api/placeholder/200/150"
      ],
      badge: 20,
      badgeClass: "bg-music"
    }
  };

  const toggleCategory = (category) => {
    if (expandedCategory === category) {
      setExpandedCategory(null);
    } else {
      setExpandedCategory(category);
    }
  };

  return (
    <div className="w-full max-w-4xl mx-auto p-4">
      {Object.entries(galleries).map(([key, gallery]) => (
        <div key={key} className="mb-8 bg-white rounded-lg shadow-lg overflow-hidden">
          <div 
            className="cursor-pointer"
            onClick={() => toggleCategory(key)}
          >
            <div className="flex p-6">
              <img
                src={gallery.mainImage}
                alt={gallery.title}
                className="w-48 h-32 object-cover rounded-lg"
              />
              
              <div className="flex-1 ml-6">
                <div className="flex justify-between items-start">
                  <div>
                    <h5 className="text-xl font-semibold mb-2">{gallery.title}</h5>
                    <p className="text-gray-600">{gallery.description}</p>
                  </div>
                  <span className={`px-3 py-1 rounded-full text-white ${gallery.badgeClass}`}>
                    {gallery.badge}
                  </span>
                </div>
                
                <div className="flex items-center mt-4">
                  {expandedCategory === key ? (
                    <ChevronUp className="text-gray-600" />
                  ) : (
                    <ChevronDown className="text-gray-600" />
                  )}
                  <span className="ml-2 text-sm text-gray-600">
                    {expandedCategory === key ? 'Show less' : 'Show more'}
                  </span>
                </div>
              </div>
            </div>
          </div>

          {/* Dropdown content */}
          {expandedCategory === key && (
            <div className="p-6 bg-gray-50 border-t">
              <h6 className="text-lg font-medium mb-4">Related Images</h6>
              <div className="grid grid-cols-3 gap-4">
                {gallery.relatedImages.map((img, index) => (
                  <div key={index} className="relative group">
                    <img
                      src={img}
                      alt={`${gallery.title} ${index + 1}`}
                      className="w-full h-32 object-cover rounded-lg transition-transform duration-200 group-hover:scale-105"
                    />
                  </div>
                ))}
              </div>
            </div>
          )}
        </div>
      ))}
    </div>
  );
};

export default ImageGallery;
